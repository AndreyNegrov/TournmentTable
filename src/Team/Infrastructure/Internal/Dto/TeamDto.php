<?php

declare(strict_types=1);

namespace App\Team\Infrastructure\Internal\Dto;

class TeamDto
{
    private int $id;
    private string $name;
    private ?int $score;
    private ?int $rating;
    private int $divisionId;

    public function __construct(
        int $id,
        string $name,
        int $divisionId,
        ?int $score,
        ?int $rating
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->score = $score;
        $this->rating = $rating;
        $this->divisionId = $divisionId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function getDivisionId(): int
    {
        return $this->divisionId;
    }
}
