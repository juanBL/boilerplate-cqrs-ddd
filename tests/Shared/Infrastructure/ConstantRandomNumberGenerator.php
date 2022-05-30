<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\Shared\Infrastructure;

use BoilerPlate\Shared\Domain\RandomNumberGenerator;

final class ConstantRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return 1;
    }
}
