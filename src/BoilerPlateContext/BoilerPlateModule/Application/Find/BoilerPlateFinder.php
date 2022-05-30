<?php

declare(strict_types=1);

namespace BoilerPlate\BoilerPlateContext\BoilerPlateModule\Application\Find;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlate;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateNotExist;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateRepository;
use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;

final class BoilerPlateFinder
{
    public function __construct(private readonly BoilerPlateRepository $repository)
    {
    }

    public function __invoke(BoilerPlateId $id): BoilerPlate
    {
        $boilerPlate = $this->repository->search($id);

        if (null === $boilerPlate) {
            throw new BoilerPlateNotExist($id);
        }

        return $boilerPlate;
    }
}
