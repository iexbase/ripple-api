<?php
namespace IEXBase\RippleAPI\Objects;

class BalanceObject extends AbstractObject
{
    /**
     * Контрагент или эмитент валюты. В случае XRP это пустая строка.
     *
     * @return string
    */
    public function getCounterParty()
    {
        return $this->getField('counterparty');
    }

    /**
     * Валюта, для которой этот баланс изменился.
     *
     * @return string
    */
    public function getCurrency()
    {
        return $this->getField('currency');
    }

    /**
     * Сумма валюты, которую связанный счет получил или потерял.
     *
     * @return string
    */
    public function getValue()
    {
        return $this->getField('value');
    }
}