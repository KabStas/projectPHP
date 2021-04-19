<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WebService;
use App\Http\Requests\QueryRequest;

class WebController extends Controller {

    private $webService;

    public function __construct(WebService $webService) {
        $this->webService = $webService;
    }

    public function outputtingPHPInfo() {

        $this->webService->outputtingPHPInfo();
    }

    public function checkingForPalindrome(QueryRequest $request) {
        
        $this->webService->checkingForPalindrome($request);
    }

    public function checkingForIP() {
        
        $this->webService->checkingForIP();
    }
}