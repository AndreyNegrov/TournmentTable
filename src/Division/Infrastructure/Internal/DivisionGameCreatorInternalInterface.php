<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Internal;

interface DivisionGameCreatorInternalInterface
{
    public function create(int $teamId, int $opponentId): int;
}
