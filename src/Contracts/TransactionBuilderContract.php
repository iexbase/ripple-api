<?php
namespace IEXBase\RippleAPI\Contracts;


interface TransactionBuilderContract
{
    /**
     * Получить тип транзакции
     *
     * @return string
     */
    public function getTransactionType();

    /**
     * Указать тип транзакции
     *
     * @param mixed $TransactionType
     * @return TransactionBuilderContract
     */
    public function setTransactionType($TransactionType);

    /**
     * Получить адрес отправителя
     *
     * @return string
     */
    public function getAccount();

    /**
     * Указать новый адрес отправителя
     * @param mixed $Account
     *
     * @return TransactionBuilderContract
     */
    public function setAccount($Account);

    /**
     * Получить сумму
     *
     * @return integer
     */
    public function getAmount() : int;

    /**
     * Указать новую сумму для отправки
     *
     * @param mixed $Amount
     * @return TransactionBuilderContract
     */
    public function setAmount($Amount);

    /**
     * Получить адрес получателя
     *
     * @return string
     */
    public function getDestination();

    /**
     * Указать новый адрес получателя
     *
     * @param mixed $Destination
     * @return TransactionBuilderContract
     */
    public function setDestination($Destination);

    /**
     * Получить DestinationTag
     *
     * @return mixed
     */
    public function getDestinationTag();

    /**
     * Указать новый DestinationTag
     *
     * @param mixed $DestinationTag
     * @return TransactionBuilderContract
     */
    public function setDestinationTag($DestinationTag);

    /**
     * Подписываем сообщение
     *
     * @return array
     */
    public function sign();
}