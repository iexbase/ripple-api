<?php
namespace IEXBase\RippleAPI\Objects;

class PaymentSummaryObject extends AbstractObject
{
    /**
     * Идентификационный хеш транзакции, вызвавшей платеж.
     *
     * @return string
    */
    public function getTxHash()
    {
        return $this->getField('tx_hash');
    }

    /**
     * Сумма валюты назначения, фактически полученная целевой учетной записью.
     *
     * @return string
    */
    public function getDeliveredAmount()
    {
        return $this->getField('delivered_amount');
    }

    /**
     * Валюта доставлена получателю транзакции.
     *
     * @return string
    */
    public function getCurrency()
    {
        return $this->getField('currency');
    }

    /**
     * Шлюз, выдающий валюту, или пустую строку для XRP.
     *
     * @return string
    */
    public function getIssuer()
    {
        return $this->getField('issuer');
    }

    /**
     * Либо sent, либо received, указав, является ли перспектива учетной записи
     * отправителем или получателем этой транзакции.
     *
     * @return string
    */
    public function getType()
    {
        return $this->getField('type');
    }
}