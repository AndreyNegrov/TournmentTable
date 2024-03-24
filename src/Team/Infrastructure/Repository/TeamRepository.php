<?php

declare(strict_types=1);

namespace App\Team\Infrastructure\Repository;

use App\Team\Domain\Entity\Team;
use App\Team\Domain\Repository\TeamRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class TeamRepository implements TeamRepositoryInterface
{
    private EntityManagerInterface $entityManager;
    private EntityRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Team::class);
    }

    public function findById(int $teamId): ?Team
    {
        return $this->repository->find($teamId);
    }

    /**
     * @return Team[]
     */
    public function findAllInDivision(int $divisionId): array
    {
        return $this->repository->findBy([
            'division' => $divisionId
        ]);
    }

    public function save(Team $team): void
    {
        $this->entityManager->persist($team);
        $this->entityManager->flush();
    }

    /**
     * @return Team[]
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}
