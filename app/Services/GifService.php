<?php

namespace App\Services;
use GuzzleHttp\Client;
//use App\Services\FillingTablesService;
use App\Models\User;
use App\Models\Update_ID;

class GifService
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
        
        
        $response = $this->client->request('GET', 'getUpdates',
            [
                'query' => [
                    'offset' => -1
                ]
            ]);

        if ($response->getStatusCode() === 200) {
            $messages = json_decode($response->getBody()->getContents(), true);
            //dd($messages);
            
            foreach ($messages['result'] as $result) {
                if (isset($result['message']['text'])) {

                    $updateID = $result['update_id'];
                    $chatId = $result['message']['from']['id'];
                    $firstName = $result['message']['from']['first_name'];
                    $lastName = $result['message']['from']['last_name'];
                    $username = $result['message']['from']['username'];
                    
                    User::create([
                        'first_name' => $firstName, 
                        'last_name' => $lastName, 
                        'username' => $username 
                    ]);
                    Update_id::create([
                        'update_id' => $updateID
                    ]);
                }
            }
        }
    }
}