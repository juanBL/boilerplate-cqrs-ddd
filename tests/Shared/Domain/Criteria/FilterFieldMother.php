<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\Shared\Domain\Criteria;

use BoilerPlate\Shared\Domain\Criteria\FilterField;
use BoilerPlate\Tests\Shared\Domain\WordMother;

final class FilterFieldMother
{
    public static function create(?string $fieldName = null): FilterField
    {
        return new FilterField($fieldName ?? WordMother::create());
    }
}
