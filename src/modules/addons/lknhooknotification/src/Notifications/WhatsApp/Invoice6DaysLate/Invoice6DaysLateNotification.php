<?php

/**
 * Code: Invoice6DaysLate
 */

namespace Lkn\HookNotification\Notifications\WhatsApp\Invoice6DaysLate;

use DateTime;
use Lkn\HookNotification\Config\Hooks;
use Lkn\HookNotification\Config\ReportCategory;
use Lkn\HookNotification\Domains\Platforms\WhatsApp\AbstractWhatsAppNotifcation;
use Lkn\HookNotification\Helpers\Logger;
use Lkn\HookNotification\Notifications\Chatwoot\WhatsAppPrivateNote\WhatsAppPrivateNoteNotification;
use Throwable;

final class Invoice6DaysLateNotification extends AbstractWhatsAppNotifcation
{
    public string $notificationCode = 'Invoice6DaysLate';
    public Hooks|array|null $hook = Hooks::DAILY_CRON_JOB;

    public function run(): bool
    {
        $this->events = [];
        $this->enableAutoReport = false;

        $this->setReportCategory(ReportCategory::INVOICE);

        $invoices = localAPI('GetInvoices', [
            'limitnum' => 1000,
            'status' => 'Overdue'
        ]);

        foreach ($invoices['invoices']['invoice'] as $invoice) {
            $givenDateTime = new DateTime($invoice['duedate']);
            $currentDateTime = new DateTime();
            $interval = $currentDateTime->diff($givenDateTime);

            if (
                $interval->days !== 6
                || $invoice['paymentmethod'] === 'freeproducts'
                || $invoice['total'] === '0.00'
            ) {
                continue;
            }

            $invoiceId = $invoice['id'];
            $clientId = $invoice['userid'];

            try {
                $this->setReportCategoryId($invoiceId);
                $this->setClientId($clientId);
                $this->setHookParams(['invoice_id' => $invoiceId]);

                $response = $this->sendMessage();

                $success = isset($response['messages'][0]['id']);

                $this->report($success);

                if ($success && class_exists('Lkn\HookNotification\Notifications\Chatwoot\WhatsAppPrivateNote\WhatsAppPrivateNoteNotification')) {
                    (new WhatsAppPrivateNoteNotification(['instance' => $this]))->run();
                }
            } catch (Throwable $th) {
                $this->report(false);

                Logger::log(
                    "{$this->getNotificationLogName()} error for invoice {$invoiceId}",
                    [
                        'msg' => 'Unable to send notification for this invoice.',
                        'context' => ['invoice' => $invoice]
                    ],
                    [
                        'response' => $response,
                        'error' => $th->__toString()
                    ]
                );
            }
        }

        return true;
    }

    public function defineParameters(): void
    {
        $this->parameters = [
            'invoice_id' => [
                'label' => $this->lang['invoice_id'],
                'parser' => fn () => $this->hookParams['invoice_id'],
            ],
            'invoice_balance' => [
                'label' => $this->lang['invoice_balance'],
                'parser' => fn (): string => self::getInvoiceBalance($this->hookParams['invoice_id'])
            ],
            'invoice_total' => [
                'label' => $this->lang['invoice_total'],
                'parser' => fn (): string => self::getInvoiceTotal($this->hookParams['invoice_id'])
            ],
            'invoice_subtotal' => [
                'label' => $this->lang['invoice_subtotal'],
                'parser' => fn (): string => self::getInvoiceSubtotal($this->hookParams['invoice_id'])
            ],
            'invoice_due_date' => [
                'label' => $this->lang['invoice_due_date'],
                'parser' => fn () => self::getInvoiceDueDateByInvoiceId($this->hookParams['invoice_id'])
            ],
            'invoice_id_and_first_item' => [
                'label' => $this->lang['invoice_id_and_first_item'],
                'parser' => fn () => $this->getInvoiceIdAndFirstItsFirstItem(),
            ],
            'invoice_pdf_url' => [
                'label' => $this->lang['invoice_pdf_url'],
                'parser' => fn () => self::getInvoicePdfUrlByInvocieId($this->hookParams['invoice_id'])
            ],
            'client_first_name' => [
                'label' => $this->lang['client_first_name'],
                'parser' => fn () => $this->getClientFirstNameByClientId($this->clientId),
            ],
            'client_full_name' => [
                'label' => $this->lang['client_full_name'],
                'parser' => fn () => $this->getClientFullNameByClientId($this->clientId),
            ],
            'client_email' => [
                'label' => $this->lang['client_email'],
                'parser' => fn () => $this->getClientEmailByClientId($this->clientId)
            ]
        ];
    }

    private function getInvoiceIdAndFirstItsFirstItem(): string
    {
        $invoiceId = $this->hookParams['invoice_id'];

        return "$invoiceId {$this->getInvoiceItemsDescriptionsByInvoiceId($invoiceId)[0]}";
    }
}
