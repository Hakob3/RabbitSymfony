<?php

namespace App\MessageHandler;

use App\Message\OrderMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class OrderMessageHandler
{
    public function __invoke(OrderMessage $message)
    {
        // Сохранение заказа в базе
        echo "Order #" . $message->getOrderId() . " processed.\n";
        // Передача данных на склад
        // ... (вызываем API склада или публикуем в очередь warehouse_queue)
    }
}
