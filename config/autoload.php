<?php

declare(strict_types=1);

use Acelaya\Doctrine\Type\PhpEnumType;
use App\Domain\Enum\GameResultType;
use App\PlayOff\Domain\Enum\PlayOffStageType;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

PhpEnumType::registerEnumTypes(
    [
        GameResultType::class,
        PlayOffStageType::class
    ]
);
