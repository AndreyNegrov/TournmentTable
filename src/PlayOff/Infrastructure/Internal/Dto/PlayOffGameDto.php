<?php

declare(strict_types=1);

namespace App\PlayOff\Infrastructure\Internal\Dto;

class PlayOffGameDto
{
    private int $id;
    private int $teamId;
    private int $opponentId;
    private string $result;
    private string $stage;

    public function __construct(
        int $id,
        int $teamId,
        int $opponentId,
        string $result,
        string $stage
    ) {
        $this->id = $id;
        $this->teamId = $teamId;
        $this->opponentId = $opponentId;
        $this->result = $result;
        $this->stage = $stage;
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

    public function getStage(): string
    {
        return $this->stage;
    }
}
