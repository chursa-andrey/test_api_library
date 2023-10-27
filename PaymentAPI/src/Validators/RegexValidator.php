<?php

namespace PaymentAPI\Validators;

use PaymentAPI\Contracts\FieldValidatorInterface;

class RegexValidator implements FieldValidatorInterface
{
    private string $pattern;
    private string $errorMessage;

    public function __construct(string $pattern, string $errorMessage = '')
    {
        $this->pattern = $pattern;
        $this->errorMessage = $errorMessage;
    }

    public function validate($value): bool
    {
        return preg_match($this->pattern, $value) === 1;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}
