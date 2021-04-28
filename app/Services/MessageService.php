<?php

namespace App\Services;
use GuzzleHttp\Client;
use App\Services\WebService;

class MessageService
{
    private $baseUrl;
    private $token;
    private $client;

    function __construct() {
        $this->baseUrl = env('TELEGRAM_API_URL'); 
        $this->token = env('TELEGRAM_BOT_TOKEN');
        $this->client = new Client(
            ['base_uri' => $this->baseUrl . 'bot' . $this->token . '/']
        );
    }

    public function getMessages() {
        
        $response = $this->client->request('GET', 'getUpdates');

        if ($response->getStatusCode() === 200) {
            $messages = json_decode($response->getBody()->getContents(), true);
            
            foreach ($messages['result'] as $result) {
                if (isset($result['message']['text'])) {

                    $update_id = $result['update_id'];
                    $text = $result['message']['text'];
                    $chatId = $result['message']['from']['id'];
                    $webService = new WebService();   
                    $palindrome = $webService->checkingForPalindrome($text);
                    $this->sendMessages($chatId, $palindrome);
                }
            }  
        }
    }

    public function sendMessages($chatId, $text) {

        $this->client->request('GET', 'sendMessage', [
            'query' => [
                'chat_id' => $chatId,
                'text' => $text,
            ]
        ]);   
    }
}