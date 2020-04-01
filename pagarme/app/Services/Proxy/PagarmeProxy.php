<?php


namespace App\Services\Proxy;


use GuzzleHttp\Client;

/**
 * Class PagarmeProxy
 * @package App\Services\Proxy
 */
class PagarmeProxy
{
    /**
     * @return mixed
     */
    public function sendPayment(){
         $client = new Client([
             'timeout' => 5,
         ]);

        $data['api_key'] = env('PAGARME_API_KEY');

        $url = 'https://api.pagar.me/1/transaction';

        $response = $client->request('POST', $url, [
            'form_params' => $data
        ]);
        $result = $response->getBody()->getContents();
        return \GuzzleHttp\json_decode($result, true);;
    }

}
