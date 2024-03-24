<?php

declare(strict_types=1);

namespace App\PlayOff\Infrastructure\Controller;

use App\PlayOff\Domain\UseCase\ChangePlayOffGameResult;
use App\PlayOff\Domain\UseCase\CreatePlayOffGame;
use App\PlayOff\Infrastructure\Controller\Request\ChangePlayOffGameResultRequest;
use App\PlayOff\Infrastructure\Controller\Request\CreatePlayOffGameRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class PlayOffController extends AbstractController
{
    public function createPlayOffGame(CreatePlayOffGameRequest $request, CreatePlayOffGame $createPlayOffGame): JsonResponse
    {
        $createPlayOffGame->create(
            $request->getStage(),
            $request->getTeamId(),
            $request->getOpponentId()
        );

        return new JsonResponse([
            'status' => 'ok'
        ]);
    }

    public function changePlayOffGameResult(ChangePlayOffGameResultRequest $request, ChangePlayOffGameResult $changePlayOffGameResult): JsonResponse
    {
        $changePlayOffGameResult->change(
            $request->getStage(),
            $request->getTeamId(),
            $request->getResult()
        );

        return new JsonResponse([
            'status' => 'ok'
        ]);
    }
}
