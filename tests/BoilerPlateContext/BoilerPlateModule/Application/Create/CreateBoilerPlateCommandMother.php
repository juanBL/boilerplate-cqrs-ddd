<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Application\Create;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Application\Create\CreateBoilerPlateCommand;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateName;
use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;
use BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateIdMother;
use BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateNameMother;

final class CreateBoilerPlateCommandMother
{
    public static function create(
        ?BoilerPlateId $id = null,
        ?BoilerPlateName $name = null,
    ): CreateBoilerPlateCommand {
        return new CreateBoilerPlateCommand(
            $id?->value() ?? BoilerPlateIdMother::create()->value(),
            $name?->value() ?? BoilerPlateNameMother::create()->value()
        );
    }
}
