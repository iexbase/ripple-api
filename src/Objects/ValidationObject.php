<?php
namespace IEXBase\RippleAPI\Objects;

class ValidationObject extends AbstractObject
{
    /**
     * Количество рябленных серверов, которые сообщали об этом подтверждении.
     *
     * @return integer
    */
    public function getCount()
    {
        return $this->getField('count');
    }

    /**
     * Речь идет о хэше регистрационной версии, к которой относится это утверждение.
     *
     * @return string
    */
    public function getLedgerHash()
    {
        return $this->getField('ledger_hash');
    }

    /**
     * Открытый ключ рифленого сервера, который впервые сообщил об этой проверке
     *
     * @return string
    */
    public function getReporterPublicKey()
    {
        return $this->getField('reporter_public_key');
    }

    /**
     * Открытый ключ валидатора, используемый для подписи этой проверки
     *
     * @return string
    */
    public function validationPublicKey()
    {
        return $this->getField('validation_public_key');
    }

    /**
     * Подпись валидатора деталей проверки
     *
     * @return string
    */
    public function getSignature()
    {
        return $this->getField('signature');
    }

    /**
     * Дата и время первого отчета об этой валидации.
     *
     * @return string
    */
    public function getFirstDatetime()
    {
        return $this->getField('first_datetime');
    }

    /**
     * Дата и время последнего отчета об этом подтверждении.
     *
     * @return string
    */
    public function getLastDatetime()
    {
        return $this->getField('last_datetime');
    }
}