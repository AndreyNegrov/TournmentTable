<?php

declare(strict_types=1);

namespace App\Division\Application\Factory;

use App\Division\Domain\Entity\DivisionGame;
use App\Division\Domain\Repository\DivisionGameRepositoryInterface;
use App\Division\Domain\Repository\DivisionRepositoryInterface;

class DivisionGameFactory
{
    private DivisionGameRepositoryInterface $divisionGameRepository;
    private DivisionRepositoryInterface $divisionRepository;

    public function __construct(
        DivisionGameRepositoryInterface $divisionGameRepository,
        DivisionRepositoryInterface $divisionRepository
    ) {
        $this->divisionGameRepository = $divisionGameRepository;
        $this->divisionRepository = $divisionRepository;
    }

    public function create(int $divisionId, int $teamId, int $opponentId): DivisionGame
    {
        $division = $this->divisionRepository->find($divisionId);
        $divisionGame = new DivisionGame($division, $teamId, $opponentId);
        $this->divisionGameRepository->save($divisionGame);

        return $divisionGame;
    }
}
