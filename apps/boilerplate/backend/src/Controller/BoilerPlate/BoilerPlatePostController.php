<?php

declare(strict_types=1);

namespace BoilerPlate\Apps\BoilerPlate\Backend\Controller\BoilerPlate;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Application\Create\CreateBoilerPlateCommand;
use BoilerPlate\Shared\Domain\Bus\Command\CommandBus;
use BoilerPlate\Shared\Domain\ValueObject\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;

final class BoilerPlatePostController
{
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    public function __invoke(string $name): JsonResponse
    {
        $this->commandBus->dispatch(new CreateBoilerPlateCommand(Uuid::random()->value(), $name));
        return new JsonResponse([]);
    }
}
