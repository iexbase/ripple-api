<?php
namespace IEXBase\RippleAPI\Objects;

class VolumeObject extends AbstractObject
{
    /**
     * Данные, которые были использованы для сборки этой суммы.
     *
     * @return array | object
     */
    public function getComponents()
    {
        return $this->getField('components');
    }

    /**
     * Общее количество обменов в этот период.
     *
     * @return integer
    */
    public function getCount()
    {
        return $this->getField('count');
    }

    /**
     * Конечное время этого интервала.
     *
     * @return string
    */
    public function getEndTime()
    {
        return $this->getField('end_time');
    }

    /**
     * Указывает используемую валюту отображения,
     * как и для валюты полей и (кроме XRP) эмитента.
     *
     * @return string
    */
    public function getExchange()
    {
        return $this->getField('exchange');
    }

    /**
     * Обменный курс с отображаемой валютой из XRP.
     *
     * @return integer
    */
    public function getExchangeRate()
    {
        return $this->getField('exchange_rate');
    }

    /**
     * Начало этого периода.
     *
     * @return string
    */
    public function getStartTime()
    {
        return $this->getField('start_time');
    }

    /**
     * Общий объем всех зарегистрированных обменных курсов за период.
     *
     * @return integer
    */
    public function getTotal()
    {
        return $this->getField('total');
    }
}