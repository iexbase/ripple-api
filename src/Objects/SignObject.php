<?php
namespace IEXBase\RippleAPI\Objects;

class SignObject extends AbstractObject
{
    /**
     * Статус подписи
     *
     * @return string
    */
    public function getStatus()
    {
        return $this->getField('status');
    }

    /**
     * Двоичное представление полностью квалифицированной подписанной транзакции
     *
     * @return string
    */
    public function getTxBlob()
    {
        return $this->getField('tx_blob');
    }

    /**
     * Спецификация jSON полной транзакции, подписанная, включая любые поля,
     * которые были автоматически заполнены
     *
     * @return TransactionCommonObject
    */
    public function getTxJson()
    {
        return $this->getField('tx_json');
    }
}