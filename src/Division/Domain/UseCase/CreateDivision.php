<?php

declare(strict_types=1);

namespace App\Division\Domain\UseCase;

use App\Division\Domain\Service\DivisionCreatorInterface;

class CreateDivision
{
    private DivisionCreatorInterface $divisionCreator;

    public function __construct(DivisionCreatorInterface $divisionCreator)
    {
        $this->divisionCreator = $divisionCreator;
    }

    public function create(string $divisionName): int
    {
        return $this
            ->divisionCreator
            ->create($divisionName)
            ->getId()
        ;
    }
}
