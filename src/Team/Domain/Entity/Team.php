<?php

declare(strict_types=1);

namespace App\Team\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Table(name="team")
 * @ORM\Entity()
 * @UniqueEntity("name")
 */
class Team
{
    use TimestampableEntity;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private string $name;

    /**
     * @ORM\Column(name="division", type="integer")
     */
    private int $division;

    /**
     * @ORM\Column(name="score", type="integer", nullable=true)
     */
    private ?int $score = null;

    /**
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private ?int $rating = null;

    public function __construct(int $division, string $name)
    {
        $this->name = $name;
        $this->division = $division;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function changeScore(int $score): void
    {
        $this->score = $score;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function changeRating(?int $rating): void
    {
        $this->rating = $rating;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function getDivision(): int
    {
        return $this->division;
    }
}
