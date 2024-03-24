<?php

declare(strict_types=1);

namespace App\Division\Application;

use App\Division\Application\Factory\DivisionFactory;
use App\Division\Domain\Entity\Division;
use App\Division\Domain\Service\DivisionCreatorInterface;

class DivisionCreator implements DivisionCreatorInterface
{
    private DivisionFactory $divisionFactory;

    public function __construct(DivisionFactory $divisionFactory)
    {
        $this->divisionFactory = $divisionFactory;
    }

    public function create(string $name): Division
    {
        return $this->divisionFactory->create($name);
    }
}
