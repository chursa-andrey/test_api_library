<?php

namespace PaymentAPI\Validators\Constants;

class RegexPatterns
{
    public const UUID_FORMAT = '/^[a-f0-9\-]{36}$/';
    public const AMOUNT = '/^[1-9]\d*(\.\d{1,2})?$/';
    public const CURRENCY_CODE = '/^[A-Z]{3}$/';
    public const CARD_NUMBER = '/^\d{13,19}$/';
    public const CARD_EXP_MONTH = '/^(0[1-9]|1[0-2])$/';
    public const CARD_EXP_YEAR = '/^\d{4}$/';
    public const CARD_CVV = '/^\d{3,4}$/';
    public const BIRTH_DATE_FORMAT = '/^\d{4}-\d{2}-\d{2}$/';
    public const COUNTRY_CODE = '/^[A-Z]{2}$/';
    public const CHANNEL_ID = '/^[\w]{1,16}$/';
}
