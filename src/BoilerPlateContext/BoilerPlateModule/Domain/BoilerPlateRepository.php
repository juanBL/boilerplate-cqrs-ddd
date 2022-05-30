<?php

declare(strict_types=1);

namespace BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain;


use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;

interface BoilerPlateRepository
{
    public function save(BoilerPlate $boilerPlate): void;

    public function search(BoilerPlateId $id): ?BoilerPlate;
}
