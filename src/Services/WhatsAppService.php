<?php
namespace Levelup\WhatsApp\Services;

use GuzzleHttp\Client;

class WhatsAppService
{

    protected $client;
    protected $accessToken;
    protected $businessId;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessToken = config('whatsappbot.access_token');
        $this->businessId = config('whatsappbot.business_id');
    }

    public function sendMessage($to, $message)
    {

        $response = $this->client->post("https://graph.facebook.com/v22.0/{$this->businessId}/messages", [
            'headers' => [
                'Authorization' => "Bearer {$this->accessToken}",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'type' => 'text',
                'text' => [
                    'body' => $message,
                ],
            ],
            'verify' => false,
        ]);
        return $response->getBody()->getContents();
    }
}
