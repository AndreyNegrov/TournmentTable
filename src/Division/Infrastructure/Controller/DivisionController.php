<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Controller;

use App\Division\Domain\UseCase\ChangeDivisionGameResult;
use App\Division\Domain\UseCase\CreateDivision;
use App\Division\Infrastructure\Controller\Request\ChangeDivisionGameResultRequest;
use App\Division\Infrastructure\Controller\Request\CreateDivisionRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DivisionController extends AbstractController
{
    public function createDivision(CreateDivisionRequest $request, CreateDivision $createDivision): JsonResponse
    {
        $divisionId = $createDivision->create($request->getDivisionName());

        return new JsonResponse([
            'status' => 'ok',
            'id' => $divisionId
        ]);
    }

    public function changeDivisionGameResult(
        ChangeDivisionGameResultRequest $request,
        ChangeDivisionGameResult $changeGameResult
    ): JsonResponse {
        $changeGameResult->change(
            $request->getTeamId(),
            $request->getOpponentId(),
            $request->getResult()
        );

        return new JsonResponse([
            'status' => 'ok'
        ]);
    }
}
