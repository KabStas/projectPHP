<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\MessageService;
//use App\Services\WebService;

class getMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получение новых сообщений';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $message = new MessageService();
        //$palindrome = new WebService1();
        //dd($palindrome->checkingForPalindrome());
        //dd($message->getMessages());
        $message->getMessages();
        //dd($message->sendMessage());
        return 0;
    }
}
