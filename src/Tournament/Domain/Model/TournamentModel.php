<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Model;

class TournamentModel
{
    /**
     * @var TeamModel[]
     */
    private array $teams;

    /**
     * @var DivisionModel[]
     */
    private array $divisions;

    /**
     * @var PlayOffGameModel[]
     */
    private array $playOffGames;

    /**
     * @param TeamModel[] $teams
     * @param DivisionModel[] $divisions
     * @param PlayOffGameModel[] $playOffGames
     */
    public function __construct(
        array $teams,
        array $divisions,
        array $playOffGames
    ) {
        $this->teams = $teams;
        $this->divisions = $divisions;
        $this->playOffGames = $playOffGames;
    }

    public function toArray(): array
    {
        $teams = array_map(fn(TeamModel $team) => $team->toArray(), $this->teams);
        $divisions = array_map(fn(DivisionModel $division) => $division->toArray(), $this->divisions);
        $playOffGames = array_map(fn(PlayOffGameModel $playOffGame) => $playOffGame->toArray(), $this->playOffGames);

        return [
            'teams' => $teams,
            'divisions' => $divisions,
            'play_off_games' => $playOffGames
        ];
    }
}
