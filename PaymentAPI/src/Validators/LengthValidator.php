<?php

namespace PaymentAPI\Validators;

use PaymentAPI\Contracts\FieldValidatorInterface;

class LengthValidator implements FieldValidatorInterface
{
    private int $maxLength;
    private string $errorMessage;

    public function __construct(int $maxLength)
    {
        $this->maxLength = $maxLength;
        $this->errorMessage = "Must be a string of up to $this->maxLength characters.";
    }

    public function validate($value): bool
    {
        if (empty(trim($value)) || strlen($value) > $this->maxLength) {
            return false;
        }
        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}
