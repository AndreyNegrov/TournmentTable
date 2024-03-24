<?php

declare(strict_types=1);

namespace App\PlayOff\Domain\Service;

use App\PlayOff\Domain\Enum\PlayOffResultType;
use App\PlayOff\Domain\Enum\PlayOffStageType;

interface PlayOffGameModifierInterface
{
    public function modifyResult(PlayOffStageType $stage, int $teamId, PlayOffResultType $result): void;
}
