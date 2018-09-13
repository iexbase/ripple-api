<?php
namespace IEXBase\RippleAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use IEXBase\RippleAPI\Objects\AccountObject;
use IEXBase\RippleAPI\Objects\PaymentObject;
use IEXBase\RippleAPI\Objects\SignObject;
use IEXBase\RippleAPI\Objects\TransactionObject;
use IEXBase\RippleAPI\Support\Collection;
use IEXBase\RippleAPI\Transaction\TransactionBuilder;

class Ripple
{
    /**
     * Адрес кошелька
     *
     * @var string
    */
    protected $address;

    /**
     * Приватный ключ кошелька
     *
     * @var string
    */
    protected $secret;

    /**
     * Ripple client service
     *
     * @var RippleClient
    */
    protected $client;

    /**
     * Получаем Хэш подписанной транзакции
     *
     * @var string
    */
    protected $tx_blob;

    /**
     * Создаем объект суперкласса Ripple.
     *
     * @param $address
     * @param null $secret
     */
    public function __construct($address, $secret = null)
    {
        $this->address = $address;
        $this->secret = $secret;

        $this->client = new RippleClient();
    }

    /**
     * Получение пинга
     *
     * @return array
    */
    public function getPing() : array
    {
        return $this->call('ping', '/');
    }

    /**
     * Получаем детальную информацию о сервере
     *
     * @return array
    */
    public function getServerInfo() : array
    {
        return $this->call('server_info', '/');
    }

    /**
     * Генерация случайних чисел
     *
     * @return array
    */
    public function getRandom() : array
    {
        return $this->call('random', '/');
    }

    /**
     * Получаем список активных аккаунтов
     *
     * @param array $params
     * @return array
     */
    public function getAccounts($params = [])
    {
        return $this->call('GET', '/accounts', $params);
    }

    /**
     * Получаем информацию об аккаунте
     *
     * @param null $address
     * @return AccountObject
     */
    public function getAccount($address = null) : AccountObject
    {
        $address = ($address == null ? $this->address : $address);
        $response = $this->call('GET', sprintf('/accounts/%s', $address));

        return new AccountObject($response['account_data']);
    }

    /**
     * Получаем баланс аккаунта
     *
     * @param null $address
     * @param array $params
     * @return array
     */
    public function getAccountBalances($address = null, $params = []) : array
    {
        $address = ($address == null ? $this->address : $address);
        $response =  $this->call('GET', sprintf('/accounts/%s/balances', $address), $params);

        return $response;
    }

    /**
     * Список транзакции аккаунта
     *
     * @param null $address
     * @param array $params
     * @return PaymentObject | array
     */
    public function getAccountPayments($address = null, $params = [])
    {
        $address = ($address == null ? $this->address : $address);
        $response = $this->call('GET', sprintf('/accounts/%s/payments', $address), $params);

        if($response['count'] == 1) {
            return new PaymentObject($response['payments'][0]);
        } else {
            return $response['payments'];
        }
    }

    /**
     * Получаем ордера клиентов
     *
     * @param $address
     * @param array $params
     * @return array
     */
    public function getAccountOrder($address = null, $params = [])
    {
        $address = ($address == null ? $this->address : $address);
        return $this->call('GET', sprintf('/account/%s/orders', $address), $params);
    }

    /**
     * Получаем историю клиентских транзакций
     *
     * @param $address
     * @param array $params
     * @return TransactionObject
     */
    public function getAccountTransactionHistory($address = null, $params = [])
    {
        $address = ($address == null ? $this->address : $address);
        $response =  $this->call('GET', sprintf('/accounts/%s/transactions', $address), $params);

        return new TransactionObject($response['transactions']);
    }

    /**
     * Получаем транзакцию по учетной записи и последовательности
     *
     * @param null $address
     * @param null $sequence
     * @param array $params
     * @return array
     */
    public function getTransactionAccountAndSequence($address = null, $sequence = null, $params = [])
    {
        $address = ($address == null ? $this->address : $address);
        return $this->call('GET', sprintf('/accounts/%s/transactions/%s', $address, $sequence), $params);
    }

    /**
     * Получить статистику транзакций по учетной записи
     *
     * @param null $address
     * @param array $params
     * @return array
     */
    public function getAccountTransactionStats($address = null, $params = [])
    {
        $address = ($address == null ? $this->address : $address);
        return $this->call('GET', sprintf('/accounts/%s/stats/transactions', $address), $params);
    }

    /**
     * Получить статистику учетной записи
     *
     * @param null $address
     * @param array $params
     * @return array
     */
    public function getAccountValueStat($address = null, $params = [])
    {
        $address = ($address == null ? $this->address : $address);
        return $this->call('GET', sprintf('/accounts/%s/stats/value', $address), $params);
    }

    /**
     * Получаем информацию о траназакции
     *
     * @param null $hash
     * @param array $params
     * @return TransactionObject | array
     */
    public function getTransaction($hash = null, $params = [])
    {
        $response = $this->call('GET', '/transactions/'.$hash, $params);

        if(isset($response['count']) and $response['count'] > 1) {
            return $response['transactions'];
        }
        return new TransactionObject($response['transaction']);
    }

    /**
     * Получение последних версий
     *
     * @return array
    */
    public function getRippledVersion()
    {
        return $this->call('GET', '/network/rippled_versions');
    }

    /**
     * Получаем список всех шлюзов
     *
     * @return array
    */
    public function getGateways()
    {
        return $this->call('GET', '/gateways');
    }

    /**
     * Получаем определенный шлюз
     *
     * @param $gateway
     * @return array
     */
    public function getGateway($gateway)
    {
        return $this->call('GET', '/gateways/'.$gateway);
    }

    /**
     * Проверка работоспособности - API
     *
     * @param array $params
     * @return array
     */
    public function getHealthCheck($params = [])
    {
        return $this->call('GET', '/health/api', $params);
    }

    /**
     * Проверка работоспособности - Импортер книги
     *
     * @param array $params
     * @return array
     */
    public function getHealthImporter($params = [])
    {
        return $this->call('GET', '/health/importer', $params);
    }

    /**
     * Проверка работоспособности - узлы ETL
     *
     * @param array $params
     * @return array
     */
    public function getHealthNodesEtl($params = [])
    {
        return $this->call('GET', '/health/nodes_etl', $params);
    }

    /**
     * Проверка работоспособности - проверки ETL
     *
     * @param array $params
     * @return array
     */
    public function getHealthValidationsEtl($params = [])
    {
        return $this->call('GET', '/health/validations_etl', $params);
    }

    /**
     * Получаем комиссию
     *
     * @return array
    */
    public function getFee()
    {
        return $this->call('fee', '/');
    }

    /**
     * Проверить транзакцию
     *
     * @param $tx
     * @return array
     */
    public function verifyTransaction($tx)
    {
        return $this->call('tx', '/', [
            'transaction'   =>  $tx
        ]);
    }

    /**
     * Получаем список всех транзакций
     * @param array $params
     * @return array
     */
    public function getTransactions($params = [])
    {
        return $this->call('GET', '/transactions', $params);
    }

    /**
     * Получаем подробную статистику об учетной записи
     *
     * @param array $params
     * @return array
     */
    public function getStats($params = [])
    {
        return $this->call('GET', '/stats', $params);
    }

    /**
     * Создаем новую транзакцию
     *
     * @param \Closure $closure
     * @return Ripple
     */
    public function buildTransaction(\Closure $closure)
    {
        $payment = new TransactionBuilder();
        $payment->setSecret($this->secret);
        $payment->setAccount($this->address);

        if($closure instanceof \Closure)
        {
            $response = $this->call('sign', '/', $closure->call($payment,$payment));
            if($response['result']['status'] == 'success') {
                $this->tx_blob = (new SignObject($response['result']))->getTxBlob();
            }

            return $this;
        }
    }

    /**
     * Отправляем подписанную транзакцию на сервер Ripple
     *
     * @return array
     * @throws \Exception
     */
    public function submit()
    {
        $result = $this->call('submit','/', [
            'tx_blob'=> $this->tx_blob
        ]);

        if(empty($result)) {
            throw new \Exception('Полученный подпись недействителен');
        } else {
            return $result;
        }
    }

    /**
     * Базовая функция для формировании запросов
     *
     * @param $method
     * @param $path
     * @param array $params
     * @return array
     */
    protected function call($method, $path, $params = [])
    {
        if(in_array($method, ['GET','POST','PUT','DELETE'])) {
            return $this->client->sendRequest(
                $method,
                trim($path),
                $params,
                true
            );
        } else {
            return $this->client->sendRequest(
                $method,
                trim($path),
                $params,
                false
            );
        }
    }
}