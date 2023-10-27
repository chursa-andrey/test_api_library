<?php

namespace PaymentAPI\Contracts;

interface RequestValidatorInterface
{
    public function validate(array $params);
}
