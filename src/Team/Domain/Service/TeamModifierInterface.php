<?php

declare(strict_types=1);

namespace App\Team\Domain\Service;

interface TeamModifierInterface
{
    public function changeScore(int $teamId, int $score): void;

    public function changeRating(int $teamId, int $rating): void;
}
