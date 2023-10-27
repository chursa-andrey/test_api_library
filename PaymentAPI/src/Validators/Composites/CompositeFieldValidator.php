<?php

namespace PaymentAPI\Validators\Composites;

use PaymentAPI\Contracts\FieldValidatorInterface;

class CompositeFieldValidator implements FieldValidatorInterface
{
    private array $validators;
    private string $errorMessage = '';

    public function addValidator(FieldValidatorInterface $validator): void
    {
        $this->validators[] = $validator;
    }

    public function validate($value): bool
    {
        foreach ($this->validators as $validator) {
            if (!$validator->validate($value)) {
                $this->errorMessage = $validator->getErrorMessage();
                return false;
            }
        }
        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}
