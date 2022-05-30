<?php

declare(strict_types=1);

namespace BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain;

use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;
use BoilerPlate\Shared\Domain\Aggregate\AggregateRoot;

final class BoilerPlate extends AggregateRoot
{
    public function __construct(private readonly BoilerPlateId $id, private readonly BoilerPlateName $name)
    {
    }

    public static function create(BoilerPlateId $id, BoilerPlateName $name): self
    {
        $boilerPlate = new self($id, $name);

        $boilerPlate->record(new BoilerPlateCreatedDomainEvent($id->value(), $name->value()));

        return $boilerPlate;
    }

    public function id(): BoilerPlateId
    {
        return $this->id;
    }

    public function name(): BoilerPlateName
    {
        return $this->name;
    }
}
