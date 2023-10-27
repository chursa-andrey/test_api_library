<?php

namespace PaymentAPI\Utils;

use PaymentAPI\Contracts\PaymentHashGeneratorInterface;

class PaymentHashGenerator implements PaymentHashGeneratorInterface
{
    public function generateHash(
        string $cardNumber,
        string $email,
        string $clientPass,
        string $transID = null
    ): string {
        $insert = $clientPass;
        if (null !== $transID) {
            $insert .= $transID;
        }

        $str = strtoupper(
            strrev($email) .
            $insert .
            strrev(substr($cardNumber, 0, 6) .
                substr($cardNumber, -4)
            )
        );

        return md5($str);
    }
}
