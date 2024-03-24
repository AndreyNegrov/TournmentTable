<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure;

use App\Tournament\Domain\UseCase\GetTournamentTable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TournamentController extends AbstractController
{
    public function getTournamentTable(GetTournamentTable $getTournamentTable): JsonResponse
    {
        $result = $getTournamentTable->get();

        return new JsonResponse([
            'data' => $result
        ]);
    }
}
