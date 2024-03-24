<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Repository;

use App\Division\Domain\Entity\Division;
use App\Division\Domain\Repository\DivisionRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class DivisionRepository implements DivisionRepositoryInterface
{
    private EntityManagerInterface $entityManager;
    private EntityRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Division::class);
    }

    public function save(Division $division): void
    {
        $this->entityManager->persist($division);
        $this->entityManager->flush();
    }

    public function find(int $id): ?Division
    {
        return $this->repository->find($id);
    }
}
