<?php

namespace App\Message;

readonly class WareHouseNotificationMessage
{
    /**
     * @param int $orderId
     */
    public function __construct(private int $orderId)
    {
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }
}
