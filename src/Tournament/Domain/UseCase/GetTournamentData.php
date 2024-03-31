<?php

declare(strict_types=1);

namespace App\Tournament\Domain\UseCase;

use App\Tournament\Domain\Factory\TournamentModelFactory;
use App\Tournament\Domain\Provider\DivisionDataProviderInterface;
use App\Tournament\Domain\Provider\PlayOffGameDataProviderInterface;
use App\Tournament\Domain\Provider\TeamDataProviderInterface;

class GetTournamentData
{
    private TeamDataProviderInterface $teamDataProvider;
    private DivisionDataProviderInterface $divisionDataProvider;
    private PlayOffGameDataProviderInterface $playOffGameDataProvider;
    private TournamentModelFactory $tournamentModelFactory;

    public function __construct(
        TeamDataProviderInterface $teamDataProvider,
        DivisionDataProviderInterface $divisionDataProvider,
        PlayOffGameDataProviderInterface $playOffGameDataProvider,
        TournamentModelFactory $tournamentModelFactory
    ) {
        $this->teamDataProvider = $teamDataProvider;
        $this->divisionDataProvider = $divisionDataProvider;
        $this->playOffGameDataProvider = $playOffGameDataProvider;
        $this->tournamentModelFactory = $tournamentModelFactory;
    }

    public function get(): string
    {
        $teamsData = $this->teamDataProvider->getAllTeamsData();
        $divisionsData = $this->divisionDataProvider->getAllDivisionsData();
        $playOffData = $this->playOffGameDataProvider->getAllPlayOffGamesData();

        $tournamentData = $this
            ->tournamentModelFactory
            ->create($teamsData, $divisionsData, $playOffData)
        ;

        return json_encode($tournamentData->toArray());
    }
}
