<?php
namespace IEXBase\RippleAPI\Support;

class TransactionType
{
    const PAYMENT = 'Payment';
    const OFFER_CREATE = 'OfferCreate';
    const OFFER_CANCEL = 'OfferCancel';
    const TRUST_SET = 'TrustSet';
    const ACCOUNT_SET = 'AccountSet';
    const SET_REGULAR_KEY = 'SetRegularKey';
    const SIGNER_LIST_SET = 'SignerListSet';
    const ESCROW_CREATE = 'EscrowCreate';
    const ESCROW_FINISH = 'EscrowFinish';
    const ESCROW_CANCEL = 'EscrowCancel';
    const PAYMENT_CHANNEL_CREATE = 'PaymentChannelCreate';
    const PAYMENT_CHANNEL_FUND = 'PaymentChannelFund';
    const PAYMENT_CHANNEL_CLAIM = 'PaymentChannelClaim';
}