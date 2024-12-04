<?php

namespace App\Controller;

use App\Message\OrderMessage;
use Random\RandomException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class OrderController extends AbstractController
{
    /**
     * @param MessageBusInterface $bus
     */
    public function __construct(private readonly MessageBusInterface $bus)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws RandomException
     * @throws ExceptionInterface
     */
    #[Route('/api/orders', name: 'create_order', methods: ['POST'])]
    public function createOrder(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['item'], $data['quantity'], $data['email'])) {
            return new JsonResponse(['error' => 'Invalid input'], 400);
        }

        $orderId = random_int(1000, 9999); // Генерируем ID заказа
        $orderMessage = new OrderMessage($orderId, $data);

        $this->bus->dispatch($orderMessage);

        return new JsonResponse(['status' => 'Order received', 'orderId' => $orderId], 202);
    }
}
