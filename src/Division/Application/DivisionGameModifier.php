<?php

declare(strict_types=1);

namespace App\Division\Application;

use App\Division\Domain\Enum\DivisionGameResultType;
use App\Division\Domain\Repository\DivisionGameRepositoryInterface;
use App\Division\Domain\Service\DivisionGameModifierInterface;

class DivisionGameModifier implements DivisionGameModifierInterface
{
    private DivisionGameRepositoryInterface $divisionGameRepository;

    public function __construct(DivisionGameRepositoryInterface $divisionGameRepository)
    {
        $this->divisionGameRepository = $divisionGameRepository;
    }

    public function changeResult(int $teamId, int $opponentId, GameResultType $result): void
    {
        $game = $this->divisionGameRepository->findByParticipants($teamId, $opponentId);
        $game->changeResult($result);
        $this->divisionGameRepository->save($game);
    }
}
