<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Application\Find;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Application\Find\BoilerPlateFinder;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateNotExist;
use BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\BoilerPlateModuleUnitTestCase;
use BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateMother;

final class BoilerPlateFinderTest extends BoilerPlateModuleUnitTestCase
{
    private BoilerPlateFinder|null $finder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->finder = new BoilerPlateFinder($this->repository());
    }

    /** @test */
    public function it_should_find_boilerplate(): void
    {
        $boilerPlate = BoilerPlateMother::create();

        $this->shouldSearch($boilerPlate->id(), $boilerPlate);
        $this->finder->__invoke($boilerPlate->id());
    }

    /** @test */
    public function it_should_throw_an_exception_when_boilerplate_not_exist(): void
    {
        $this->expectException(BoilerPlateNotExist::class);

        $boilerPlate = BoilerPlateMother::create();

        $this->shouldSearch($boilerPlate->id(), null);
        $this->finder->__invoke($boilerPlate->id());
    }
}
