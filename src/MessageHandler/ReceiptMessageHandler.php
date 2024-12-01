<?php

namespace App\MessageHandler;

use App\Message\ReceiptMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ReceiptMessageHandler
{
    public function __invoke(ReceiptMessage $message): void
    {
        echo "Receipt sent to " . $message->getEmail() . " for order #" . $message->getOrderId() . "\n";
    }
}
