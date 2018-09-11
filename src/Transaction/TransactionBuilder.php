<?php
namespace IEXBase\RippleAPI\Transaction;

use IEXBase\RippleAPI\Contracts\TransactionBuilderContract;
use IEXBase\RippleAPI\Support\Arr;

class TransactionBuilder implements TransactionBuilderContract
{
    /**
     * Проверка транзакции
     *
     * @var boolean
    */
    protected $offline = false;

    /**
     * Секретный ключ
     *
     * @var string
    */
    protected $secret = null;

    /**
     * Тип транзакции
     *
     * @var string
    */
    protected $TransactionType = null;

    /**
     * Адрес кошелька отправителя
     *
     * @var string
    */
    protected $Account = null;

    /**
     * Сумма отправки
     *
     * @var integer
    */
    protected $Amount = 0;

    /**
     * Адрес получателя
     *
     * @var string
    */
    protected $Destination = null;

    /**
     * Метка (DestinationTag)
     *
     * @var string
    */
    protected $DestinationTag = null;

    /**
     * Если true, при построении транзакции не пытайтесь автоматически заполнять или проверять значения.
     *
     * @return bool
     */
    public function isOffline(): bool
    {
        return $this->offline;
    }

    /**
     * Уставливаем новое значение
     *
     * @param bool $offline
     * @return TransactionBuilder
     */
    public function setOffline(bool $offline)
    {
        $this->offline = $offline;
        return $this;
    }

    /**
     * Получить приватный ключ
     *
     * @return null
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Указать новый приватный ключ
     *
     * @param null $secret
     * @return TransactionBuilder
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * Получить тип транзакции
     *
     * @return string
     */
    public function getTransactionType()
    {
        return $this->TransactionType;
    }

    /**
     * Указать тип транзакции
     *
     * @param mixed $TransactionType
     * @return TransactionBuilder
     */
    public function setTransactionType($TransactionType)
    {
        $this->TransactionType = $TransactionType;
        return $this;
    }

    /**
     * Получить адрес отправителя
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->Account;
    }

    /**
     * Указать новый адрес отправителя
     * @param mixed $Account
     *
     * @return TransactionBuilder
     */
    public function setAccount($Account)
    {
        $this->Account = $Account;
        return $this;
    }

    /**
     * Получить сумму
     *
     * @return integer
     */
    public function getAmount() : int
    {
        return $this->Amount * 1e6;
    }

    /**
     * Указать новую сумму для отправки
     *
     * @param mixed $Amount
     * @return TransactionBuilder
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;
        return $this;
    }

    /**
     * Получить адрес получателя
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->Destination;
    }

    /**
     * Указать новый адрес получателя
     *
     * @param mixed $Destination
     * @return TransactionBuilder
     */
    public function setDestination($Destination)
    {
        $this->Destination = $Destination;
        return $this;
    }

    /**
     * Получить DestinationTag
     *
     * @return mixed
     */
    public function getDestinationTag() : int
    {
        return $this->DestinationTag;
    }

    /**
     * Указать новый DestinationTag
     *
     * @param mixed $DestinationTag
     * @return TransactionBuilder
     */
    public function setDestinationTag($DestinationTag)
    {
        $this->DestinationTag = $DestinationTag;
        return $this;
    }

    /**
     * Подписываем сообщение
     *
     * @return array
    */
    public function sign()
    {
        $array = [];
        if($this->getDestinationTag() != null) {
            Arr::set($array,'tx_json.DestinationTag', $this->getDestinationTag());
        }

        if($this->getDestination() != null) {
            Arr::set($array,'tx_json.Destination', $this->getDestination());
        }

        if($this->getAmount() != null) {
            Arr::set($array,'tx_json.Amount', $this->getAmount());
        }

        if($this->getAccount() != null) {
            Arr::set($array,'tx_json.Account', $this->getAccount());
        }

        if($this->getTransactionType() != null) {
            Arr::set($array,'tx_json.TransactionType', $this->getTransactionType());
        }

        return array_merge([
            'offline'   =>  $this->isOffline(),
            'secret'    =>  $this->getSecret()
        ], $array);
    }
}