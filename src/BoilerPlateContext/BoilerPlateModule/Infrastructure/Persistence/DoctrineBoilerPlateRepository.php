<?php

declare(strict_types=1);

namespace BoilerPlate\BoilerPlateContext\BoilerPlateModule\Infrastructure\Persistence;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlate;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateRepository;
use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;
use BoilerPlate\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineBoilerPlateRepository extends DoctrineRepository implements BoilerPlateRepository
{
    public function save(BoilerPlate $boilerPlate): void
    {
        $this->persist($boilerPlate);
    }

    public function search(BoilerPlateId $id): ?BoilerPlate
    {
        return $this->repository(BoilerPlate::class)->find($id);
    }
}
