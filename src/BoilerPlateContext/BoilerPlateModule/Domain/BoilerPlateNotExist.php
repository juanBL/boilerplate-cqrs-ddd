<?php

declare(strict_types=1);

namespace BoilerPlate\BoilerPlateContext\BoilerPlateModule\Domain;

use BoilerPlate\BoilerPlateContext\Shared\Domain\BoilerPlateModule\BoilerPlateId;
use BoilerPlate\Shared\Domain\DomainError;

final class BoilerPlateNotExist extends DomainError
{
    public function __construct(private readonly BoilerPlateId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'boilerplate_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The boiler plate <%s> does not exist', $this->id->value());
    }
}
