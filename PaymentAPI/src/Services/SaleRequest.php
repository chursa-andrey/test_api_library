<?php

namespace PaymentAPI\Services;

use PaymentAPI\Contracts\RequestInterface;
use PaymentAPI\Contracts\RequestValidatorInterface;
use PaymentAPI\Contracts\PaymentHashGeneratorInterface;

class SaleRequest implements RequestInterface
{
    private array $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public static function create(
        array $parameters,
        string $clientPass,
        RequestValidatorInterface $validator,
        PaymentHashGeneratorInterface $hashGenerator
    ): self {
        $validator->validate($parameters);
        $parameters['hash'] = $hashGenerator->generateHash(
            $parameters['card_number'],
            $parameters['payer_email'],
            $clientPass
        );

        return new self($parameters);
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
