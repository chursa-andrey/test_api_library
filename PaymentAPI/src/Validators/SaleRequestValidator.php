<?php

namespace PaymentAPI\Validators;

use InvalidArgumentException;
use PaymentAPI\Contracts\RequestValidatorInterface;
use PaymentAPI\Validators\Configs\SaleFieldsConfig;
use PaymentAPI\Validators\Factories\ValidatorFactory;

class SaleRequestValidator implements RequestValidatorInterface
{
    private const ACTION_SALE = 'SALE';
    private array $fieldsConfig;
    private array $fieldValidators = [];

    public function __construct(SaleFieldsConfig $fieldsConfig)
    {
        $this->fieldsConfig = $fieldsConfig->getFieldsConfig();
        $this->initializeFieldValidators();
    }

    private function initializeFieldValidators(): void
    {
        foreach ($this->fieldsConfig as $fieldName => $fieldConfig) {
            $this->fieldValidators[$fieldName] = ValidatorFactory::createCompositeValidator($fieldConfig);
        }
    }

    public function validate(array $data): void
    {
        if (!isset($data['action']) || self::ACTION_SALE !== $data['action']) {
            throw new InvalidArgumentException(
                'Invalid action: "' . $data['action'] .
                '". It must be "' . self::ACTION_SALE . '".'
            );
        }

        foreach ($this->fieldsConfig as $field => $fieldConfig) {
            $this->validateField($field, $fieldConfig, $data[$field] ?? null);
        }
    }

    private function validateField(string $field, array $fieldConfig, $value): void
    {
        if (!$fieldConfig['required'] && null === $value) {
            return;
        }

        if ($fieldConfig['required'] && null === $value) {
            throw new InvalidArgumentException("'$field' is a required parameter.");
        }

        $validator = $this->fieldValidators[$field];
        if (!$validator->validate($value)) {
            $errorMessage = "Invalid value for $field: '$value'. " . $validator->getErrorMessage();
            throw new InvalidArgumentException($errorMessage);
        }
    }
}
