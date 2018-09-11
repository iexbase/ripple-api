<?php
namespace IEXBase\RippleAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class RippleClient
{
    /**
     * @const string Ripple API URL
    */
    const BASE_REST_URL = 'https://data.ripple.com/v2';

    /**
     * @const string Ripple RPC URL
    */
    const BASE_RPC_URL = 'https://s2.ripple.com:51234';

    /**
     * Guzzle Http клиент
     *
     * @var Client
     */
    protected $client;

    /**
     * Количество запросов
     *
     * @var integer
    */
    protected $requestCount = 0;

    /**
     * Создаем новый объект RippleClient
     *
     * @return void.
    */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Отправляем запросы на сервер Ripple
     *
     * @param $method
     * @param $path
     * @param array $options
     * @param boolean $api
     * @return array
     */
    public function sendRequest($method, $path, $options = [], $api = true)
    {
        $this->requestCount++;
        $url =  sprintf('%s%s', ($api == true) ? self::BASE_REST_URL : self::BASE_RPC_URL, $path);

        try {
            if($api == true) {
                $response = $this->client->request($method, $url, ['query' => $options]);
            } else {

                $body = [
                    'id'        =>  $this->requestCount,
                    'method'    =>  $method,
                    'json_rpc'  =>  '2.0',
                ];

                if(is_array($options) and !empty($options)) {
                    $body['params'] = [$options];
                }

                $response = $this->client->request('POST', $url, [
                    'body'  =>  json_encode($body)
                ]);
            }
            return $this->toArray($response->getBody()->getContents());

        } catch (GuzzleException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Преобразовываем любой ответ в массив
     *
     * @param $data
     * @return array|bool|mixed|null
     */
    public function toArray($data)
    {
        $decodedBody = json_decode($data, true);

        if($decodedBody === null) {
            $decodedBody = [];
        } elseif(is_bool($decodedBody)) {
            $decodedBody = ['success' => $decodedBody];
        }

        if(!is_array($decodedBody)) {
            $decodedBody = [];
        }

        return $decodedBody;
    }
}