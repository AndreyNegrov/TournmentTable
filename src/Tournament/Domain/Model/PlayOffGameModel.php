<?php

declare(strict_types=1);

namespace App\Tournament\Domain\Model;

class PlayOffGameModel
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

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'stage' => $this->stage,
            'team_id' => $this->teamId,
            'opponent_id' => $this->opponentId,
            'result' => $this->result
        ];
    }
}
