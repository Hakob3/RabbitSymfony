<?php

namespace App\MessageHandler;

use App\Message\WarehouseNotificationMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class WarehouseNotificationMessageHandler
{
    public function __invoke(WarehouseNotificationMessage $message): void
    {
        echo "Warehouse notified for order #" . $message->getOrderId() . "\n";
    }
}
