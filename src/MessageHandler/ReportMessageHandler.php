<?php

namespace App\MessageHandler;

use App\Message\ReportMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ReportMessageHandler
{
    public function __invoke(ReportMessage $message): void
    {
        file_put_contents('message.json', $message->getReportType());
        echo sprintf("Generating report for User ID %d of type %s\n", $message->getUserId(), $message->getReportType());
        sleep(3);

        echo "Report generated successfully!\n";
    }
}
