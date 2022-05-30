<?php

declare(strict_types=1);

namespace BoilerPlate\Shared\Infrastructure\Symfony;

use BoilerPlate\Shared\Domain\Bus\Command\Command;
use BoilerPlate\Shared\Domain\Bus\Command\CommandBus;
use BoilerPlate\Shared\Domain\Bus\Query\Query;
use BoilerPlate\Shared\Domain\Bus\Query\QueryBus;
use BoilerPlate\Shared\Domain\Bus\Query\Response;
use function Lambdish\Phunctional\each;

abstract class ApiController
{
    public function __construct(
        private QueryBus $queryBus,
        private CommandBus $commandBus,
        ApiExceptionsHttpStatusCodeMapping $exceptionHandler
    ) {
        each(
            fn(int $httpCode, string $exceptionClass) => $exceptionHandler->register($exceptionClass, $httpCode),
            $this->exceptions()
        );
    }

    abstract protected function exceptions(): array;

    protected function ask(Query $query): ?Response
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
