<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Model;

class TeamModel
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

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'division' => $this->divisionId,
            'score' => $this->score,
            'rating' => $this->rating
        ];
    }
}
