<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\Shared\Domain\Criteria;

use BoilerPlate\Shared\Domain\Criteria\Filter;
use BoilerPlate\Shared\Domain\Criteria\FilterField;
use BoilerPlate\Shared\Domain\Criteria\FilterOperator;
use BoilerPlate\Shared\Domain\Criteria\FilterValue;

final class FilterMother
{
    public static function create(
        ?FilterField $field = null,
        ?FilterOperator $operator = null,
        ?FilterValue $value = null
    ): Filter {
        return new Filter(
            $field ?? FilterFieldMother::create(),
            $operator ?? FilterOperator::random(),
            $value ?? FilterValueMother::create()
        );
    }

    /** @param string[] $values */
    public static function fromValues(array $values): Filter
    {
        return Filter::fromValues($values);
    }
}
