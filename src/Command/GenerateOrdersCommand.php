<?php
namespace App\Command;

use App\Message\OrderMessage;
use Random\RandomException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(name: 'app:generate-orders')]
class GenerateOrdersCommand extends Command
{
    public function __construct(private readonly MessageBusInterface $bus) { parent::__construct(); }

    /**
     * @throws RandomException
     * @throws ExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        for ($i = 1; $i <= 1000; $i++) {
            $orderData = ['item' => 'Product ' . $i, 'quantity' => random_int(1, 5)];
            $this->bus->dispatch(new OrderMessage($i, $orderData));
            usleep(50000); // 50ms между заказами
        }

        return Command::SUCCESS;
    }
}
