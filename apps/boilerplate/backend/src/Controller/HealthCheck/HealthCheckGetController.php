<?php

declare(strict_types=1);

namespace BoilerPlate\Apps\BoilerPlate\Backend\Controller\HealthCheck;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class HealthCheckGetController
{
    public function __construct()
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(
            [
                'backend' => 'ok',
            ]
        );
    }
}
