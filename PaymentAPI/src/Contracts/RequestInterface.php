<?php

namespace PaymentAPI\Contracts;

interface RequestInterface
{
    public function getParameters(): array;
}
