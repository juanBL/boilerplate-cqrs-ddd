<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Domain;

use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;
use BoilerPlate\Tests\Shared\Domain\UuidMother;

final class BoilerPlateIdMother
{
    public static function create(?string $value = null): BoilerPlateId
    {
        return new BoilerPlateId($value ?? UuidMother::create());
    }
}
