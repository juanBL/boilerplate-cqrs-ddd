<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Application\Create;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Application\Create\BoilerPlateCreator;
use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Application\Create\CreateBoilerPlateCommandHandler;
use BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\BoilerPlateModuleUnitTestCase;
use BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateCreatedDomainEventMother;
use BoilerPlate\Tests\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateMother;

final class CreateBoilerPlateCommandHandlerTest extends BoilerPlateModuleUnitTestCase
{
    private CreateBoilerPlateCommandHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateBoilerPlateCommandHandler(
            new BoilerPlateCreator($this->repository(), $this->eventBus())
        );
    }

    /** @test */
    public function it_should_create_a_valid_boilerplate(): void
    {
        $command = CreateBoilerPlateCommandMother::create();

        $boilerPlate = BoilerPlateMother::fromRequest($command);
        $domainEvent = BoilerPlateCreatedDomainEventMother::fromBoilerPlate($boilerPlate);

        $this->shouldSave($boilerPlate);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
