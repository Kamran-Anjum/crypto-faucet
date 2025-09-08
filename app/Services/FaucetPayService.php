<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FaucetPayService
{
    protected $apiUrl = "https://faucetpay.io/api/v1/send";
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('FAUCETPAY_API_KEY');
    }

    public function send($to, $amount, $currency = 'DOGE')
    {
        $response = Http::asForm()->post($this->apiUrl, [
            'api_key' => $this->apiKey,
            'amount' => $amount,
            'to' => $to,
            'currency' => $currency,
        ]);

        return $response->json();
    }
}
