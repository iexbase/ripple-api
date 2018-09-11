<?php
namespace IEXBase\RippleAPI\Objects;

class TransactionObject extends AbstractObject
{
    /**
     * Определяющее значение хэш-функции, уникальное для этой транзакции.
     *
     * @return string
    */
    public function getHash()
    {
        return $this->getField('hash');
    }

    /**
     * Время, когда эта транзакция была включена в проверенную книгу.
     *
     * @return string
    */
    public function getDate()
    {
        return $this->getField('date');
    }

    /**
     * Номер последовательности регистра, в который включена эта книга.
     *
     * @return integer
    */
    public function getLedgerIndex()
    {
        return $this->getField('ledger_index');
    }

    /**
     * Поля этого объекта транзакции, определенные в формате транзакции.
     *
     * @return object
    */
    public function getTx()
    {
        return $this->getField('tx');
    }

    /**
     * Метаданные о результатах этой транзакции.
     *
     * @return object
    */
    public function getMeta()
    {
        return $this->getField('meta');
    }
}