<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Model;

class DivisionGameModel
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

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'team_id' => $this->teamId,
            'opponent_id' => $this->opponentId,
            'result' => $this->result
        ];
    }
}
