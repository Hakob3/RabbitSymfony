<?php
namespace App\Message;

readonly class ReportMessage
{
    public function __construct(
        private int $userId,
        private string $reportType
    ) {}

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getReportType(): string
    {
        return $this->reportType;
    }
}
