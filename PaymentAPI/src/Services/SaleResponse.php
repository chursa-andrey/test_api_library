<?php

namespace PaymentAPI\Services;

use PaymentAPI\Contracts\ResponseInterface;

class SaleResponse implements ResponseInterface
{
    private string $result;
    private string $status = '';
    private array $data;
    private const RESULT_ERROR = 'ERROR';

    public function __construct(array $data)
    {
        $this->result = $data['result'];
        $this->data = $data;

        if ($this->isSuccessful() && isset($data['status'])) {
            $this->status = $data['status'];
        }
    }

    public function getResult(): string
    {
        return $this->result;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getResponseData(): array
    {
        return $this->data;
    }

    public function isSuccessful(): bool
    {
        return $this->result !== self::RESULT_ERROR;
    }

    public function getErrorCode(): ?string
    {
        return $this->isSuccessful() ? null : $this->data['error_code'] ?? null;
    }

    public function getErrorMessage(): ?string
    {
        return $this->isSuccessful() ? null : $this->data['error_message'] ?? null;
    }
}
