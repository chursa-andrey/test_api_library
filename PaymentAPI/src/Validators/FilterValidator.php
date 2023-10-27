<?php

namespace PaymentAPI\Validators;

use PaymentAPI\Contracts\FieldValidatorInterface;

class FilterValidator implements FieldValidatorInterface
{
    private int $filter;
    private string $errorMessage;

    public function __construct(int $filter, string $errorMessage = '')
    {
        $this->filter = $filter;
        $this->errorMessage = $errorMessage;
    }

    public function validate($value): bool
    {
        if (!filter_var($value, $this->filter)) {
            return false;
        }
        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}
