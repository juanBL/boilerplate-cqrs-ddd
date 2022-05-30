<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Domain;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateName;
use BoilerPlate\Tests\Shared\Domain\WordMother;

final class BoilerPlateNameMother
{
    public static function create(?string $value = null): BoilerPlateName
    {
        return new BoilerPlateName($value ?? WordMother::create());
    }
}
