<?php

namespace App\Message;

readonly class OrderMessage
{
    /**
     * @param int $orderId
     * @param array $orderData
     */
    public function __construct(private int $orderId, private array $orderData)
    {
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @return array
     */
    public function getOrderData(): array
    {
        return $this->orderData;
    }
}
