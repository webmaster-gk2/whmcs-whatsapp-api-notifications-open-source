<?php

/**
 * Code: TicketAnswered
 */

namespace Lkn\HookNotification\Notifications\WhatsApp\TicketAnswered;

use Lkn\HookNotification\Config\Hooks;
use Lkn\HookNotification\Config\Platforms;
use Lkn\HookNotification\Config\ReportCategory;
use Lkn\HookNotification\Config\Settings;
use Lkn\HookNotification\Domains\Platforms\WhatsApp\AbstractWhatsAppNotifcation;
use Lkn\HookNotification\Helpers\Config;
use Lkn\HookNotification\Helpers\Lang;
use Lkn\HookNotification\Helpers\WhmcsApi;

final class TicketAnsweredNotification extends AbstractWhatsAppNotifcation
{
    public string $notificationCode = 'TicketAnswered';
    public Hooks|array|null $hook = Hooks::TICKET_ADMIN_REPLY;

    public function run(): bool
    {
        // Setup properties for reporting purposes (not required).
        $this->setReportCategory(ReportCategory::TICKET);
        $this->setReportCategoryId($this->hookParams['ticketid']);

        $useTicketWhatsAppCf = Config::get(Platforms::WHATSAPP, Settings::WP_USE_TICKET_WHATSAPP_CF_WHEN_SET);

        if ($useTicketWhatsAppCf === 'disabled') {
            return $this->sendMessageForRegisteredClient();
        } else {
            if ($this->getTicketWhatsAppCfValue($this->hookParams['ticketid']) === null) {
                return $this->sendMessageForRegisteredClient();
            } else {
                return $this->sendMessageForUnregisteredClient($useTicketWhatsAppCf);
            }
        }
    }

    private function sendMessageForRegisteredClient(): bool
    {
        // Setup client ID for getting its WhatsApp number (required).
        $clientId = $this->getClientIdByTicketId($this->hookParams['ticketid']);

        $this->setClientId($clientId);
        // Send the message and get the raw response (converted to array) from WhatsApp API.
        $response = $this->sendMessage();

        // Defines if response tells if the message was sent successfully.
        $success = isset($response['messages'][0]['id']);

        return $success;
    }

    private function sendMessageForUnregisteredClient(): bool
    {
        if (!empty($this->hookParams['ticketid'])) {
            $clientId = $this->getClientIdByTicketId($this->hookParams['ticketid']);

            if (!is_null($clientId)) {
                $this->setClientId($clientId);
            }
        }

        $whatsAppNumber = $this->getTicketWhatsAppCfValue($this->hookParams['ticketid']);

        $response = $this->sendMessage($whatsAppNumber);

        $success = isset($response['messages'][0]['id']);

        // Disable the event of sending a private note to Chatwoot, which is by default for registered clients.
        $this->events = [];

        if ($success) {
            $ticketUrl = WhmcsApi::getAdminRootUrl("supporttickets.php?action=view&id={$this->reportCategoryId}");
            $msg = Lang::text('notification') . ": {$this->lang['notification_title']} [#{$this->reportCategoryId}]({$ticketUrl})";

            $this->eventsInstance->sendMsgToChatwootAsPrivateNoteForUnregisteredClient(
                $whatsAppNumber,
                $msg,
                $this->parameters['client_full_name']['parser'](),
                $this->getTicketEmail($this->hookParams['ticketid']),
                Config::get(Platforms::CHATWOOT, Settings::CW_WHATSAPP_INBOX_ID)
            );
        }

        return $success;
    }

    public function defineParameters(): void
    {
        $this->parameters = [
            'ticket_id' => [
                'label' => $this->lang['ticket_id'],
                'parser' => fn () => $this->hookParams['ticketid']
            ],
            'ticket_mask' => [
                'label' => $this->lang['ticket_mask'],
                'parser' => fn () => $this->getTicketMask($this->hookParams['ticketid'])
            ],
            'ticket_subject' => [
                'label' => $this->lang['ticket_subject'],
                'parser' => fn () => $this->hookParams['subject']
            ],
            'client_first_name' => [
                'label' => $this->lang['client_first_name'],
                'parser' => fn () => empty($this->clientId) ? $this->getTicketNameColumn($this->hookParams['ticketid']) : $this->getClientFirstNameByClientId($this->clientId)
            ],
            'client_full_name' => [
                'label' => $this->lang['client_full_name'],
                'parser' => fn () => empty($this->clientId) ? $this->getTicketNameColumn($this->hookParams['ticketid']) : $this->getClientFullNameByClientId($this->clientId)
            ]
        ];
    }
}
