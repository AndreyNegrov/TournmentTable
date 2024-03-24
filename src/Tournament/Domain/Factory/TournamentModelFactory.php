<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Factory;

use App\Tournament\Domain\Model\DivisionModel;
use App\Tournament\Domain\Model\PlayOffGameModel;
use App\Tournament\Domain\Model\TeamModel;
use App\Tournament\Domain\Model\TournamentModel;

class TournamentModelFactory
{
    /**
     * @param TeamModel[] $teamModels
     * @param DivisionModel[] $divisionModels
     * @param PlayOffGameModel[] $playOffGameModels
     */
    public function create(array $teamModels, array $divisionModels, array $playOffGameModels): TournamentModel
    {
        return new TournamentModel(
            $teamModels,
            $divisionModels,
            $playOffGameModels
        );
    }
}
