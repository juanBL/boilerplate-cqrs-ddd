<?php

declare(strict_types=1);

namespace BoilerPlate\BoilerPlateContext\BoilerPlateModule\Infrastructure\Persistence\Doctrine;

use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;
use BoilerPlate\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class BoilerPlateIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return BoilerPlateId::class;
    }
}
