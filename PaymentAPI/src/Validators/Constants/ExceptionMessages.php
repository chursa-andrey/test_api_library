<?php

namespace PaymentAPI\Validators\Constants;

class ExceptionMessages
{
    public const UUID_FORMAT = 'The value must be in UUID format.';
    public const AMOUNT = 'Must be in the form XXXX.XX without leading zeros.';
    public const CURRENCY_CODE = 'Must be a 3-letter code';
    public const CARD_NUMBER = '';
    public const CARD_EXP_MONTH = 'Must be in the format XX.';
    public const CARD_EXP_YEAR = 'Must be in the format XXXX.';
    public const CARD_CVV = 'Must be 3-4 digits.';
    public const BIRTH_DATE_FORMAT = 'Must be in the format yyyy-MM-dd.';
    public const COUNTRY_CODE = 'Must be a 2-letter code';
    public const CHANNEL_ID = 'Must be a string of up to 16 characters.';
}
