<?php

namespace PaymentAPI\Contracts;

interface FieldValidatorInterface
{
    public function validate($value): bool;
    public function getErrorMessage(): string;
}
