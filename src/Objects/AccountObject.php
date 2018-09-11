<?php
namespace IEXBase\RippleAPI\Objects;

class AccountObject extends AbstractObject
{
    /**
     * Идентификационный адрес этой учетной записи на base-58.
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->getField('account');
    }

    /**
     * Временная метка UTC, когда адрес был профинансирован
     *
     * @return string
     */
    public function getInception()
    {
        return $this->getField('inception');
    }

    /**
     * Последовательный номер журнала при создании учетной записи
     *
     * @return integer
     */
    public function getLedgerIndex()
    {
        return $this->getField('ledger_index');
    }

    /**
     * (Опущено для счетов генезиса) Адрес, который предоставил XRP для финансирования.
     *
     * @return string
     */
    public function getParent()
    {
        return $this->getField('parent');
    }

    /**
     * (Опущено для учетных записей генезиса)
     * Идентификационный хеш транзакции, которая финансировала эту учетную запись.
     *
     * @return string
     */
    public function getTxHash()
    {
        return $this->getField('tx_hash');
    }

    /**
     * Доступный баланс XRP
     *
     * @return string
     */
    public function getInitialBalance()
    {
        return $this->getField('initial_balance');
    }

    /**
     * (Только для счетов Genesis) Сумма XRP, на которую рассчитана учетная запись № 32570.
     *
     * @return string
     */
    public function getGenesisBalance()
    {
        return $this->getField('genesis_balance');
    }

    /**
     * (Только для учетных записей Genesis)
     * Номер последовательности транзакций в учетной записи с регистрационной книгой # 32570.
     *
     * @return integer
     */
    public function getGenesisIndex()
    {
        return $this->getField('genesis_index');
    }
}