<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\Shared\Domain\Criteria;

use BoilerPlate\Shared\Domain\Criteria\OrderBy;
use BoilerPlate\Tests\Shared\Domain\WordMother;

final class OrderByMother
{
    public static function create(?string $fieldName = null): OrderBy
    {
        return new OrderBy($fieldName ?? WordMother::create());
    }
}
