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
        $this->accessToken = env('WHATSAPP_ACCESS_TOKEN');
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