<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Domain;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Application\Create\CreateBoilerPlateCommand;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlate;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateName;
use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;

final class BoilerPlateMother
{
    public static function create(
        ?BoilerPlateId $id = null,
        ?BoilerPlateName $name = null,
    ): BoilerPlate {
        return new BoilerPlate(
            $id ?? BoilerPlateIdMother::create(),
            $name ?? BoilerPlateNameMother::create(),
        );
    }

    public static function fromRequest(CreateBoilerPlateCommand $request): BoilerPlate
    {
        return self::create(
            BoilerPlateIdMother::create($request->id()),
            BoilerPlateNameMother::create($request->name())
        );
    }
}
