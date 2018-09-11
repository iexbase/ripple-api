<?php
namespace IEXBase\RippleAPI\Objects;

class PaymentObject extends AbstractObject
{
    protected static $objectMap = [
        'destination_balance_changes'   =>  '\IEXBase\RippleAPI\Objects\BalanceObject',
        'source_balance_changes'        =>  '\IEXBase\RippleAPI\Objects\BalanceObject'
    ];

    /**
     * Сумма валюты получателя, которую транзакция получила указание отправить.
     * В случае частичных платежей это «максимальная» сумма.
     *
     * @return string
    */
    public function getAmount()
    {
        return $this->getField('amount');
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
     * Массив объектов изменения баланса, указывающий все изменения,
     * сделанные на балансах конечной учетной записи.
     *
     * @return BalanceObject
    */
    public function getDestinationBalanceChanges()
    {
        return $this->getField('destination_balance_changes');
    }

    /**
     * Массив объектов изменения баланса, указывающий все изменения балансов исходной учетной записи
     * (за исключением стоимости транзакции XRP).
     *
     * @return BalanceObject
    */
    public function getSourceBalanceChanges()
    {
        return $this->getField('source_balance_changes');
    }

    /**
     * Сумма XRP, потраченная исходной учетной записью на стоимость транзакции.
     *
     * @return string
    */
    public function getTransactionCost()
    {
        return $this->getField('transaction_cost');
    }

    /**
     * (Необязательный) Тег назначения, указанный в этом платеже.
     *
     * @return string
    */
    public function getDestinationTag()
    {
        return $this->getField('destination_tag');
    }

    /**
     * (Необязательный) Исходный тег, указанный в этом платеже.
     *
     * @return string
    */
    public function getSourceTag()
    {
        return $this->getField('source_tag');
    }

    /**
     * Валюта, получаемая получателем.
     *
     * @return string
    */
    public function getCurrency()
    {
        return $this->getField('currency');
    }

    /**
     * Учетная запись, которая получила платеж.
     *
     * @return string
    */
    public function getDestination()
    {
        return $this->getField('destination');
    }

    /**
     * Время, когда бухгалтер, включивший этот платеж, был закрыт.
     *
     * @return string
    */
    public function getExecutedTime()
    {
        return $this->getField('executed_time');
    }

    /**
     * Номер последовательности регистра, который включал этот платеж.
     *
     * @return integer
    */
    public function getLedgerIndex()
    {
        return $this->getField('ledger_index');
    }

    /**
     * Учетная запись, отправившая платеж.
     *
     * @return string
    */
    public function getSource()
    {
        return $this->getField('source');
    }

    /**
     * Валюта, которую потратил исходный счет.
     *
     * @return string
    */
    public function getSourceCurrency()
    {
        return $this->getField('source_currency');
    }

    /**
     * Идентификационный хеш транзакции, вызвавшей платеж.
     *
     * @return string
    */
    public function getTxHash()
    {
        return $this->getField('tx_hash');
    }
}