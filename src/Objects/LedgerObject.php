<?php
namespace IEXBase\RippleAPI\Objects;


class LedgerObject extends AbstractObject
{
    /**
     * Уникальный хэш, уникальный для этой книги, как шестнадцатеричная строка.
     *
     * @return string
    */
    public function getLedgerHash()
    {
        return $this->getField('ledger_hash');
    }

    /**
     * Номер последовательности регистра.
     *
     * @return integer
    */
    public function getLedgerIndex()
    {
        return $this->getField('ledger_index');
    }

    /**
     * Идентификационный хэш предыдущей книги.
     *
     * @return string
    */
    public function getParentHash()
    {
        return $this->getField('parent_hash');
    }

    /**
     * Общее количество «drops» XRP все еще существует во время книги. (Каждый XRP составляет 1 000 000 drops.)
     *
     * @return string
    */
    public function getTotalCoins()
    {
        return $this->getField('total_coins');
    }

    /**
     * Время закрытия книги округлено до этого много секунд.
     *
     * @return integer
    */
    public function getCloseTimeRes()
    {
        return $this->getField('close_time_res');
    }

    /**
     * Хэш информации учетной записи, содержащейся в этой книге.
     *
     * @return string
    */
    public function getAccountsHash()
    {
        return $this->getField('accounts_hash');
    }

    /**
     * Хеш информации транзакции, содержащейся в этой книге.
     *
     * @return string
    */
    public function getTransactionsHash()
    {
        return $this->getField('transactions_hash');
    }

    /**
     * Когда эта книга была закрыта во время UNIX.
     *
     * @return integer
    */
    public function getCloseTime()
    {
        return $this->getField('close_time');
    }

    /**
     * Когда эта книга была закрыта.
     *
     * @return string
    */
    public function getCloseTimeHuman()
    {
        return $this->getField('close_time_human');
    }
}