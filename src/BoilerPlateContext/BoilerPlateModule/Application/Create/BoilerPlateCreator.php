<?php

declare(strict_types=1);

namespace BoilerPlate\BoilerPlateContext\BoilerPlateModule\Application\Create;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlate;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateName;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateRepository;
use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;
use BoilerPlate\Shared\Domain\Bus\Event\EventBus;

final class BoilerPlateCreator
{
    public function __construct(private readonly BoilerPlateRepository $repository, private readonly EventBus $bus)
    {
    }

    public function __invoke(BoilerPlateId $id, BoilerPlateName $name): void
    {
        $boilerPlate = BoilerPlate::create($id, $name);

        $this->repository->save($boilerPlate);
        $this->bus->publish(...$boilerPlate->pullDomainEvents());
    }
}
