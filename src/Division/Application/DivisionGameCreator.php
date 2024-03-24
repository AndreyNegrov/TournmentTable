<?php

declare(strict_types=1);

namespace App\Division\Application;

use App\Division\Application\Factory\DivisionGameFactory;
use App\Division\Domain\Entity\DivisionGame;

class DivisionGameCreator
{
    private DivisionGameFactory $divisionGameFactory;

    public function __construct(DivisionGameFactory $divisionGameFactory)
    {
        $this->divisionGameFactory = $divisionGameFactory;
    }

    public function create(int $teamId, int $opponentId): DivisionGame
    {
        return $this->divisionGameFactory->create($teamId, $opponentId);
    }
}
