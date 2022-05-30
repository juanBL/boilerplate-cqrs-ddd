<?php

declare(strict_types=1);

namespace BoilerPlate\BoilerPlateContext\BoilerPlateModule\Application\Create;

use BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain\BoilerPlateName;
use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;
use BoilerPlate\Shared\Domain\Bus\Command\CommandHandler;

final class CreateBoilerPlateCommandHandler implements CommandHandler
{
    public function __construct(private readonly BoilerPlateCreator $creator)
    {
    }

    public function __invoke(CreateBoilerPlateCommand $command): void
    {
        $id = new BoilerPlateId($command->id());
        $name = new BoilerPlateName($command->name());

        $this->creator->__invoke($id, $name);
    }
}
