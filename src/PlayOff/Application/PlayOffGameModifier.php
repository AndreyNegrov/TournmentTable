<?php

declare(strict_types=1);

namespace App\PlayOff\Application;

use App\PlayOff\Domain\Enum\PlayOffResultType;
use App\PlayOff\Domain\Enum\PlayOffStageType;
use App\PlayOff\Domain\Repository\PlayOffGameRepositoryInterface;
use App\PlayOff\Domain\Service\PlayOffGameModifierInterface;

class PlayOffGameModifier implements PlayOffGameModifierInterface
{
    private PlayOffGameRepositoryInterface $playOffGameRepository;

    public function __construct(PlayOffGameRepositoryInterface $playOffGameRepository)
    {
        $this->playOffGameRepository = $playOffGameRepository;
    }

    public function modifyResult(PlayOffStageType $stage, int $teamId, PlayOffResultType $result): void
    {
        $playOffGame = $this->playOffGameRepository->findByStageAndTeam($stage, $teamId);
        $playOffGame->changeResult($result);
        $this->playOffGameRepository->save($playOffGame);
    }
}
