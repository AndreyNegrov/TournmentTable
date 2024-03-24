<?php

declare(strict_types=1);

namespace App\Team\Application;

interface TeamGameCreatorInterface
{
    public function create(int $teamId, int $opponentId): int;
}
