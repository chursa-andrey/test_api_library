<?php

namespace PaymentAPI\Contracts;

interface PaymentHashGeneratorInterface
{
    public function generateHash(string $cardNumber, string $email, string $clientPass): string;
}
