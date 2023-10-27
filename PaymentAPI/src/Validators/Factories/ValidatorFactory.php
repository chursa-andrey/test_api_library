<?php

namespace PaymentAPI\Validators\Factories;

use InvalidArgumentException;
use PaymentAPI\Validators\Composites\CompositeFieldValidator;
use PaymentAPI\Validators\Constants\ValidateTypes;
use PaymentAPI\Validators\EnumValidator;
use PaymentAPI\Validators\FilterValidator;
use PaymentAPI\Validators\LengthValidator;
use PaymentAPI\Validators\RegexValidator;

class ValidatorFactory
{
    public static function createCompositeValidator(array $config): CompositeFieldValidator
    {
        $compositeValidator = new CompositeFieldValidator();

        foreach ($config['validateTypes'] as $type) {
            switch ($type) {
                case ValidateTypes::REGEX:
                    $compositeValidator->addValidator(
                        new RegexValidator(
                            $config['pattern'],
                            $config['additionalMessage'] ?? ''
                        )
                    );
                    break;

                case ValidateTypes::LENGTH:
                    $compositeValidator->addValidator(
                        new LengthValidator($config['maxLength'])
                    );
                    break;

                case ValidateTypes::FILTER:
                    $compositeValidator->addValidator(
                        new FilterValidator($config['filter'])
                    );
                    break;

                case ValidateTypes::ENUM:
                    $compositeValidator->addValidator(
                        new EnumValidator($config['allowedValues'])
                    );
                    break;

                default:
                    throw new InvalidArgumentException("Invalid validator type: $type");
            }
        }

        return $compositeValidator;
    }
}
