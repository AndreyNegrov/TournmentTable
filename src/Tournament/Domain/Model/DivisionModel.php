<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Model;

class DivisionModel
{
    /**
     * @var DivisionGameModel[]
     */
    private array $divisionGameModels;
    private int $id;
    private string $name;

    /**
     * @param DivisionGameModel[] $divisionGameModels
     */
    public function __construct(
        int $id,
        string $name,
        array $divisionGameModels
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->divisionGameModels = $divisionGameModels;
    }

    public function toArray(): array
    {
        $divisionGames = array_map(fn(DivisionGameModel $game) => $game->toArray(), $this->divisionGameModels);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'games' => $divisionGames
        ];
    }
}
