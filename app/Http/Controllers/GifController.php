<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FillingTablesService;
use App\Http\Requests\QueryRequest;
use App\Services\GifService;



class GifController extends Controller {

    
    private $gifService;

    public function __construct(GifService $gifService) {
       
        $this->gifService = $gifService;
    }


    public function getMessages() {

        $this->gifService->getMessages();
    }
}