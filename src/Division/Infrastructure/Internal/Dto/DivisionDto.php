<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Internal\Dto;

class DivisionDto
{
    /**
     * @var DivisionGameDto[]
     */
    private array $divisionGames;
    private int $id;
    private string $name;

    /**
     * @param DivisionGameDto[] $divisionGames
     */
    public function __construct(
        int $id,
        string $name,
        array $divisionGames
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->divisionGames = $divisionGames;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDivisionGames(): array
    {
        return $this->divisionGames;
    }
}
