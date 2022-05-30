<?php

declare(strict_types=1);

namespace BoilerPlate\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}
