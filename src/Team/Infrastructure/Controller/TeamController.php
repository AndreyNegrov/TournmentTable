<?php

declare(strict_types=1);

namespace App\Team\Infrastructure\Controller;

use App\Team\Domain\UseCase\ChangeTeamRating;
use App\Team\Domain\UseCase\ChangeTeamScore;
use App\Team\Domain\UseCase\CreateTeam;
use App\Team\Infrastructure\Controller\Request\ChangeTeamRatingRequest;
use App\Team\Infrastructure\Controller\Request\ChangeTeamScoreRequest;
use App\Team\Infrastructure\Controller\Request\CreateTeamRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TeamController extends AbstractController
{
    public function changeTeamScore(ChangeTeamScoreRequest $request, ChangeTeamScore $changeTeamScore): JsonResponse
    {
        $changeTeamScore->change($request->getTeamId(), $request->getScore());

        return new JsonResponse([
            'status' => 'ok'
        ]);
    }

    public function createTeam(CreateTeamRequest $request, CreateTeam $createTeam): JsonResponse
    {
        $teamId = $createTeam->create($request->getDivisionId(), $request->getTeamName());

        return new JsonResponse([
            'id' => $teamId
        ]);
    }

    public function addTeamPlace(ChangeTeamRatingRequest $request, ChangeTeamRating $changeTeamRating): JsonResponse
    {
        $changeTeamRating->change($request->getTeamId(), $request->getRating());

        return new JsonResponse([
            'status' => 'ok'
        ]);
    }
}
