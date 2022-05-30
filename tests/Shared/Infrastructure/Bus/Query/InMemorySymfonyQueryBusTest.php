<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\Shared\Infrastructure\Bus\Query;

use BoilerPlate\Shared\Domain\Bus\Query\Query;
use BoilerPlate\Shared\Infrastructure\Bus\Query\InMemorySymfonyQueryBus;
use BoilerPlate\Shared\Infrastructure\Bus\Query\QueryNotRegisteredError;
use BoilerPlate\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;
use RuntimeException;

final class InMemorySymfonyQueryBusTest extends UnitTestCase
{
    private InMemorySymfonyQueryBus|null $queryBus;

    protected function setUp(): void
    {
        parent::setUp();

        $this->queryBus = new InMemorySymfonyQueryBus([$this->queryHandler()]);
    }

    /** @test */
    public function it_should_return_a_response_successfully(): void
    {
        $this->expectException(RuntimeException::class);

        $this->queryBus->ask(new FakeQuery());
    }

    /** @test */
    public function it_should_raise_an_exception_dispatching_a_non_registered_query(): void
    {
        $this->expectException(QueryNotRegisteredError::class);

        $this->queryBus->ask($this->query());
    }

    private function queryHandler(): object
    {
        return new class {
            public function __invoke(FakeQuery $query)
            {
                throw new RuntimeException('This works fine!');
            }
        };
    }

    private function query(): Query|MockInterface
    {
        return $this->mock(Query::class);
    }
}
