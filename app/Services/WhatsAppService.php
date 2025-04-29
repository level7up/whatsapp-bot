<?php
namespace App\Services;

use GuzzleHttp\Client;

class WhatsAppService
{

    protected $client;
    protected $accessToken;
    protected $businessId;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessToken = 'EAAJYqzirEk4BO8j606zkV0rBbt33WN6pwAZB6t9grNrV0LUhSB8nYdHyMyCZBOtuA9fDWnGjANk0z3BK2hfB8SdfrmWZCd3ZBOJul7hdX41LH8XLs15xf3iOapFAmumYbZBVzvHltfyo0yf1aLkNEr0sNlG7D2EbsEgaYIeWegFg0J7OdwR6TYRY44ZCwx2Jdtqoiv7TZBDXeBNR23eipIpclmBKyAZD';
        $this->businessId = env('WHATSAPP_BUSINESS_ID');
    }

    public function sendMessage($to, $message)
    {

        $response = $this->client->post("https://graph.facebook.com/v22.0/{$this->businessId}/messages", [
            'headers' => [
                'Authorization' => "Bearer $this->accessToken",
                'Content-Type'  => 'application/json',
            ],
            'json' => [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'type' => 'template',
                'template' => [
                    'name' => 'new_bot',
                    'language' => [
                        'code' => 'en_US'
                    ]
                ]
            ],
            'verify' => false,
        ]);
        return $response->getBody()->getContents();
    }
}