<?php

declare(strict_types=1);

namespace BoilerPlate\Shared\Domain;

interface UuidGenerator
{
    public function generate(): string;
}
