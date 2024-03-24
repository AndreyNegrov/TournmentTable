<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Internal\Dto;

class DivisionGameDto
{
    private int $id;
    private int $teamId;
    private int $opponentId;
    private string $result;

    public function __construct(
        int $id,
        int $teamId,
        int $opponentId,
        string $result
    ) {
        $this->id = $id;
        $this->teamId = $teamId;
        $this->opponentId = $opponentId;
        $this->result = $result;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getOpponentId(): int
    {
        return $this->opponentId;
    }

    public function getResult(): string
    {
        return $this->result;
    }
}
