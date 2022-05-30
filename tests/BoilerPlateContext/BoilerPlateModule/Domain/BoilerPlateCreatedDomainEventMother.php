<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Domain;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlate;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateCreatedDomainEvent;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateName;
use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;

final class BoilerPlateCreatedDomainEventMother
{
    public static function create(
        ?BoilerPlateId $id = null,
        ?BoilerPlateName $name = null
    ): BoilerPlateCreatedDomainEvent {
        return new BoilerPlateCreatedDomainEvent(
            $id?->value() ?? BoilerPlateIdMother::create()->value(),
            $name?->value() ?? BoilerPlateNameMother::create()->value()
        );
    }

    public static function fromBoilerPlate(BoilerPlate $boilerPlate): BoilerPlateCreatedDomainEvent
    {
        return self::create($boilerPlate->id(), $boilerPlate->name());
    }
}
