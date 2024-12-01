<?php

namespace App\Message;

readonly class ReceiptMessage
{
    public function __construct(private int $orderId, private string $email) {}

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }
}
