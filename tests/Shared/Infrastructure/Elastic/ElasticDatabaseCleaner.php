<?php

declare(strict_types=1);

namespace BoilerPlate\Tests\Shared\Infrastructure\Elastic;

use BoilerPlate\Shared\Infrastructure\Elasticsearch\ElasticsearchClient;
use function Lambdish\Phunctional\each;

final class ElasticDatabaseCleaner
{
    public function __invoke(ElasticsearchClient $client)
    {
        $indices = $client->client()->cat()->indices();

        each(
            static function (array $index) use ($client) {
                $indexName = $index['index'];

                $client->client()->indices()->delete(['index' => $indexName]);
                $client->client()->indices()->create(['index' => $indexName]);
            },
            $indices
        );
    }
}
