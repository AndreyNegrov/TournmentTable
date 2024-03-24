<?php

declare(strict_types=1);

namespace App\Team\Application;

use App\Team\Domain\Repository\TeamRepositoryInterface;
use App\Team\Domain\Service\TeamModifierInterface;

class TeamModifier implements TeamModifierInterface
{
    private TeamRepositoryInterface $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function changeScore(int $teamId, int $score): void
    {
        $team = $this->teamRepository->findById($teamId);
        $team->changeScore($score);
        $this->teamRepository->save($team);
    }

    public function changeRating(int $teamId, int $rating): void
    {
        $team = $this->teamRepository->findById($teamId);
        $team->changeRating($rating);
        $this->teamRepository->save($team);
    }
}
