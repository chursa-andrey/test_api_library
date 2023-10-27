<?php

namespace PaymentAPI\Validators\Configs;

use PaymentAPI\Validators\Constants\ExceptionMessages;
use PaymentAPI\Validators\Constants\RegexPatterns;
use PaymentAPI\Validators\Constants\ValidateTypes;

class SaleFieldsConfig
{
    private array $fieldsConfig = [
        'client_key' => [
            'validateTypes' => [ ValidateTypes::REGEX ],
            'pattern' => RegexPatterns::UUID_FORMAT,
            'additionalMessage' => ExceptionMessages::UUID_FORMAT,
            'required' => true
        ],
        'order_id' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 255,
            'required' => true
        ],
        'order_amount' => [
            'validateTypes' => [ ValidateTypes::REGEX ],
            'pattern' => RegexPatterns::AMOUNT,
            'additionalMessage' => ExceptionMessages::AMOUNT,
            'required' => true
        ],
        'order_currency' => [
            'validateTypes' => [ ValidateTypes::REGEX ],
            'pattern' => RegexPatterns::CURRENCY_CODE,
            'additionalMessage' => ExceptionMessages::CURRENCY_CODE,
            'required' => true
        ],
        'order_description' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 1024,
            'required' => true
        ],
        'card_number' => [
            'validateTypes' => [ ValidateTypes::REGEX ],
            'pattern' => RegexPatterns::CARD_NUMBER,
            'additionalMessage' => ExceptionMessages::CARD_NUMBER,
            'required' => true
        ],
        'card_exp_month' => [
            'validateTypes' => [ ValidateTypes::REGEX ],
            'pattern' => RegexPatterns::CARD_EXP_MONTH,
            'additionalMessage' => ExceptionMessages::CARD_EXP_MONTH,
            'required' => true
        ],
        'card_exp_year' => [
            'validateTypes' => [ ValidateTypes::REGEX ],
            'pattern' => RegexPatterns::CARD_EXP_YEAR,
            'additionalMessage' => ExceptionMessages::CARD_EXP_YEAR,
            'required' => true
        ],
        'card_cvv2' => [
            'validateTypes' => [ ValidateTypes::REGEX ],
            'pattern' => RegexPatterns::CARD_CVV,
            'additionalMessage' => ExceptionMessages::CARD_CVV,
            'required' => true
        ],
        'payer_first_name' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 32,
            'required' => true
        ],
        'payer_last_name' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 32,
            'required' => true
        ],
        'payer_address' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 32,
            'required' => true
        ],
        'payer_country' => [
            'validateTypes' => [ ValidateTypes::REGEX ],
            'pattern' => RegexPatterns::COUNTRY_CODE,
            'additionalMessage' => ExceptionMessages::COUNTRY_CODE,
            'required' => true
        ],
        'payer_city' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 32,
            'required' => true
        ],
        'payer_zip' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 10,
            'required' => true
        ],
        'payer_email' => [
            'validateTypes' => [
                ValidateTypes::FILTER,
                ValidateTypes::LENGTH
            ],
            'maxLength' => 25,
            'filter' => FILTER_VALIDATE_EMAIL,
            'required' => true
        ],
        'payer_phone' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 32,
            'required' => true
        ],
        'payer_ip' => [
            'validateTypes' => [ ValidateTypes::FILTER ],
            'filter' => FILTER_VALIDATE_IP,
            'required' => true
        ],
        'term_url_3ds' => [
            'validateTypes' => [
                ValidateTypes::FILTER,
                ValidateTypes::LENGTH
            ],
            'maxLength' => 1024,
            'filter' => FILTER_VALIDATE_URL,
            'required' => true
        ],
        'channel_id' => [
            'validateTypes' => [ ValidateTypes::REGEX ],
            'pattern' => RegexPatterns::CHANNEL_ID,
            'additionalMessage' => ExceptionMessages::CHANNEL_ID,
            'required' => false
        ],
        'payer_middle_name' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 32,
            'required' => false
        ],
        'payer_birth_date' => [
            'validateTypes' => [ ValidateTypes::REGEX ],
            'pattern' => RegexPatterns::BIRTH_DATE_FORMAT,
            'additionalMessage' => ExceptionMessages::BIRTH_DATE_FORMAT,
            'required' => false
        ],
        'payer_address2' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 32,
            'required' => false
        ],
        'payer_state' => [
            'validateTypes' => [ ValidateTypes::LENGTH ],
            'maxLength' => 32,
            'required' => false
        ],
        'recurring_init' => [
            'validateTypes' => [ ValidateTypes::ENUM ],
            'allowedValues' => ['Y','N'],
            'required' => false
        ],
        'auth' => [
            'validateTypes' => [ ValidateTypes::ENUM ],
            'allowedValues' => ['Y','N'],
            'required' => false
        ]
    ];

    public function getFieldsConfig(): array
    {
        return $this->fieldsConfig;
    }
}
