<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlate;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateRepository;
use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;
use BoilerPlate\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class BoilerPlateModuleUnitTestCase extends UnitTestCase
{
    private BoilerPlateRepository|MockInterface|null $repository;

    protected function shouldSave(BoilerPlate $boilerPlate): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($boilerPlate))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(BoilerPlateId $id, ?BoilerPlate $boilerPlate): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($boilerPlate);
    }

    protected function repository(): BoilerPlateRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(BoilerPlateRepository::class);
    }
}
