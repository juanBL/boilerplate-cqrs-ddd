<?php

declare(strict_types=1);

namespace BoilerPlate\BoilerPlateContext\Shared\Infrastructure\Doctrine;

use BoilerPlate\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;

final class BoilerPlateContextEntityManagerFactory
{
    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(
                __DIR__ . '/../../../../BoilerPlateContext',
                'BoilerPlate\BoilerPlateContext'
            ),
        );

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(
            __DIR__ . '/../../../../BoilerPlateContext',
            'BoilerPlateContext'
        );

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            $dbalCustomTypesClasses
        );
    }
}
