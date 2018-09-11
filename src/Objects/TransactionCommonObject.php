<?php
namespace IEXBase\RippleAPI\Objects;


class TransactionCommonObject extends AbstractObject
{
    /**
     * Уникальный адрес учетной записи, инициировавшей транзакцию.
     *
     * @return string
    */
    public function getAccount()
    {
        return $this->getField('Account');
    }

    /**
     * Тип транзакции
     *
     * Допустимые типы: Payment, OfferCreate, OfferCancel, TrustSet, AccountSet,
     * SetRegularKey, SignerListSet, EscrowCreate, EscrowFinish, EscrowCancel,
     * PaymentChannelCreate, PaymentChannelFund, и PaymentChannelClaim.
     *
     * @return string
    */
    public function getTransactionType()
    {
        return $this->getField('TransactionType');
    }

    /**
     * Целочисленное количество XRP в drops, которое должно быть
     * уничтожено как стоимость для распределения этой транзакции в сети.
     */
    public function getFee()
    {
        return $this->getField('Fee');
    }

    /**
     * Номер последовательности по отношению к инициирующей учетной записи этой транзакции
     *
     * @return integer
    */
    public function getSequence()
    {
        return $this->getField('Sequence');
    }

    /**
     * Значение хеширования, идентифицирующее другую транзакцию.
     *
     * @return string
    */
    public function getAccountTxnID()
    {
        return $this->getField('AccountTxnID');
    }

    /**
     * Набор бит-флагов для этой транзакции.
     *
     * @return integer
    */
    public function getFlags()
    {
        return $this->getField('Flags');
    }

    /**
     * Показатель с наивысшей регистрацией, в который может вступить транзакция.
     *
     * @return integer
    */
    public function getLastLedgerSequence()
    {
        return $this->getField('LastLedgerSequence');
    }

    /**
     * Дополнительная произвольная информация, используемая для идентификации этой транзакции.
     *
     * @return array|object
    */
    public function getMemos()
    {
        return $this->getField('Memos');
    }

    /**
     * Массив объектов, которые представляют собой многозадачную подпись,
     * которая разрешает эту транзакцию.
     *
     * @return array
    */
    public function getSigners()
    {
        return $this->getField('Signers');
    }

    /**
     * Произвольное целое число, используемое для определения причины этого платежа,
     * или отправителя, от имени которого совершена эта транзакция.
     *
     * @return integer
    */
    public function getSourceTag()
    {
        return $this->getField('SourceTag');
    }

    /**
     * Hex-представление открытого ключа, которое соответствует закрытому ключу,
     * используемому для подписи этой транзакции.
     *
     * @return string
    */
    public function getSigningPubKey()
    {
        return $this->getField('SigningPubKey');
    }

    /**
     * Подпись, которая проверяет эту транзакцию как исходящую от учетной записи,
     * из которой она написана.
     *
     * @return string
    */
    public function getTxnSignature()
    {
        return $this->getField('TxnSignature');
    }
}