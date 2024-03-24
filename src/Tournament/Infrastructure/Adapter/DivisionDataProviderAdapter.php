<?php

declare(strict_types=1);

namespace App\Tournament\Infrastructure\Adapter;

use App\Division\Infrastructure\Internal\DivisionDataProviderInternalInterface;
use App\Division\Infrastructure\Internal\Dto\DivisionDto;
use App\Tournament\Domain\Provider\DivisionDataProviderInterface;
use App\Tournament\Infrastructure\Adapter\Decoder\DivisionDtoDecoder;

class DivisionDataProviderAdapter implements DivisionDataProviderInterface
{
    private DivisionDataProviderInternalInterface $dataProviderInternal;
    private DivisionDtoDecoder $divisionDtoDecoder;

    public function __construct(
        DivisionDataProviderInternalInterface $dataProviderInternal,
        DivisionDtoDecoder $divisionDtoDecoder
    ) {
        $this->dataProviderInternal = $dataProviderInternal;
        $this->divisionDtoDecoder = $divisionDtoDecoder;
    }

    public function getAllDivisionsData(): array
    {
        $divisionDtoArray = $this->dataProviderInternal->getAllDivisionsData();

        return array_map(fn(DivisionDto $divisionDto) => $this->divisionDtoDecoder->decode($divisionDto), $divisionDtoArray);
    }
}
