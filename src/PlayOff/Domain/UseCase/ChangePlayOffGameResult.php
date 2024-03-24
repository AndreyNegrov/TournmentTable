<?php

declare(strict_types=1);

namespace App\PlayOff\Domain\UseCase;

use App\PlayOff\Domain\Enum\PlayOffResultType;
use App\PlayOff\Domain\Enum\PlayOffStageType;
use App\PlayOff\Domain\Service\PlayOffGameModifierInterface;

class ChangePlayOffGameResult
{
    private PlayOffGameModifierInterface $playOffModifier;

    public function __construct(PlayOffGameModifierInterface $playOffModifier)
    {
        $this->playOffModifier = $playOffModifier;
    }

    public function change(PlayOffStageType $stage, int $teamId, PlayOffResultType $result): void
    {
        $this->playOffModifier->modifyResult($stage, $teamId, $result);
    }
}
