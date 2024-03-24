<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Internal;

use App\Division\Infrastructure\Internal\Dto\DivisionDto;

interface DivisionDataProviderInternalInterface
{
    /**
     * @return DivisionDto[]
     */
    public function getAllDivisionsData(): array;
}
