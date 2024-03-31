<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure;

use App\Tournament\Domain\UseCase\GetTournamentData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TournamentController extends AbstractController
{
    public function getTournamentData(GetTournamentData $getTournamentData): JsonResponse
    {
        $result = $getTournamentData->get();

        return new JsonResponse([
            'data' => $result
        ]);
    }
}
