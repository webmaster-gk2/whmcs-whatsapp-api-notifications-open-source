<?php

/**
 * Code: NewServiceInvoice
 */

namespace Lkn\HookNotification\Notifications\WhatsApp\NewServiceInvoice;

use Lkn\HookNotification\Config\Hooks;
use Lkn\HookNotification\Config\ReportCategory;
use Lkn\HookNotification\Domains\Platforms\WhatsApp\AbstractWhatsAppNotifcation;

/**
 * Runs when a recurring existing service invoice is created.
 *
 * @since 3.2.0
 */
final class NewServiceInvoiceNotification extends AbstractWhatsAppNotifcation
{
    public string $notificationCode = 'NewServiceInvoice';

    /**
     * @var \Lkn\HookNotification\Config\Hooks|array|null
     * @link https://developers.whmcs.com/hooks-reference/cron/#dailycronjob
     */
    public Hooks|array|null $hook = Hooks::INVOICE_CREATED;

    public function run(): bool
    {
        if (!$this->mustRun()) {
            $this->events = [];
            $this->enableAutoReport = false;

            return false;
        }

        // Setup properties for reporting purposes (not required).
        $this->setReportCategory(ReportCategory::INVOICE);
        $this->setReportCategoryId($this->hookParams['invoiceid']);

        // Setup client ID for getting its WhatsApp number (required).
        $clientId = $this->getClientIdByInvoiceId($this->hookParams['invoiceid']);

        $this->setClientId($clientId);
        // Send the message and get the raw response (converted to array) from WhatsApp API.
        $response = $this->sendMessage();

        // Defines if response tells if the message was sent successfully.
        $success = isset($response['messages'][0]['id']);

        return $success;
    }

    /**
     * This method checks if the invoice refers to a active service of the client.
     *
     * @return bool
     */
    private function mustRun(): bool
    {
        $invoiceId = $this->hookParams['invoiceid'];

        // Checks if the invoice was generated by the CRON.
        if ($this->hookParams['source'] !== 'autogen' || $this->hookParams['user'] !== 'system') {
            return false;
        }

        // Invoices of orders does not count.
        if (is_int(self::getOrderIdByInvoiceId($invoiceId))) {
            return false;
        }

        $invoiceItems = self::getInvoiceItems($invoiceId);

        $invoiceItemRelatedToProduct = array_filter(
            $invoiceItems,
            function (array $item): bool {
                return !empty($item['product_id']);
            }
        );

        if (count($invoiceItemRelatedToProduct) > 0) {
            return true;
        }

        return false;
    }

    private function getAsaasPayUrl()
    {
        $invoicePayMethod = Capsule::table('tblinvoices')->where('id', $this->reportCategoryId)->first('paymentmethod')->paymentmethod;

        if ($invoicePayMethod !== 'cobrancaasaasmpay') {
            return;
        }

        $asaasPayBoletoUrl = Capsule::table('mod_cobrancaasaasmpay')->where('fatura_id', $this->reportCategoryId)->first('url_boleto')->url_boleto;

        if (empty($asaasPayBoletoUrl)) {
            throw new Exception('Could not get Asaas URL.');
        }

        return str_replace('/b/pdf/', '/i/', $asaasPayBoletoUrl);
    }

    public function defineParameters(): void
    {
        $this->parameters = [
            'invoice_id' => [
                'label' => $this->lang['invoice_id'],
                'parser' => fn () => $this->reportCategoryId
            ],
            'invoice_items' => [
                'label' => $this->lang['invoice_items'],
                'parser' => fn () => self::getOrderItemsDescripByOrderId(self::getOrderIdByInvoiceId($this->reportCategoryId))
            ],
            'invoice_due_date' => [
                'label' => $this->lang['invoice_due_date'],
                'parser' => fn () => self::getInvoiceDueDateByInvoiceId($this->reportCategoryId)
            ],
            'invoice_pdf_url' => [
                'label' => $this->lang['invoice_pdf_url'],
                'parser' => fn (): string => self::getInvoicePdfUrlByInvocieId($this->hookParams['invoiceid'])
            ],
            'invoice_pdf_url_asaas_pay' => [
                'label' => $this->lang['invoice_pdf_url_asaas_pay'],
                'parser' => fn () => $this->getAsaasPayUrl()
            ],
            'invoice_balance' => [
                'label' => $this->lang['invoice_balance'],
                'parser' => fn (): string => self::getInvoiceBalance($this->hookParams['invoiceid'])
            ],
            'invoice_total' => [
                'label' => $this->lang['invoice_total'],
                'parser' => fn (): string => self::getInvoiceTotal($this->hookParams['invoiceid'])
            ],
            'invoice_subtotal' => [
                'label' => $this->lang['invoice_subtotal'],
                'parser' => fn (): string => self::getInvoiceSubtotal($this->hookParams['invoiceid'])
            ],
            'client_id' => [
                'label' => $this->lang['client_id'],
                'parser' => fn () => $this->clientId
            ],
            'client_first_name' => [
                'label' => $this->lang['client_first_name'],
                'parser' => fn () => $this->getClientFirstNameByClientId($this->clientId)
            ],
            'client_email' => [
                'label' => $this->lang['client_email'],
                'parser' => fn () => $this->getClientEmailByClientId($this->clientId)
            ],
            'client_full_name' => [
                'label' => $this->lang['client_full_name'],
                'parser' => fn () => $this->getClientFullNameByClientId($this->clientId)
            ]
        ];
    }
}
