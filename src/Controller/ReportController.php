<?php

namespace App\Controller;

use App\Message\ReportMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    #[Route('/generate-report/{userId}/{reportType}', methods: ['GET'])]
    public function generateReport(int $userId, string $reportType, MessageBusInterface $messageBus): JsonResponse
    {
        $message = new ReportMessage($userId, $reportType);
        $messageBus->dispatch($message);

        return new JsonResponse(['status' => 'Report request submitted']);
    }
}
