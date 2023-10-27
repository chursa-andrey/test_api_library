<?php

namespace PaymentAPI\Validators;

use PaymentAPI\Contracts\FieldValidatorInterface;

class EnumValidator implements FieldValidatorInterface
{
    private array $allowedValues;
    private string $errorMessage;

    public function __construct(array $allowedValues)
    {
        $this->allowedValues = $allowedValues;
        $allowed = implode(", ", $this->allowedValues);
        $this->errorMessage = "Must be one of [$allowed].";
    }

    public function validate($value): bool
    {
        if (!in_array($value, $this->allowedValues)) {
            return false;
        }
        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}
