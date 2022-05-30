<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\Shared\Domain\Criteria;

use BoilerPlate\Shared\Domain\Criteria\FilterValue;
use BoilerPlate\Tests\Shared\Domain\WordMother;

final class FilterValueMother
{
    public static function create(?string $value = null): FilterValue
    {
        return new FilterValue($value ?? WordMother::create());
    }
}
