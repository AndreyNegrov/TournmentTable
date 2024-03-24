<?php

declare(strict_types=1);

namespace App\Division\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Table(name="division")
 * @ORM\Entity()
 * @UniqueEntity("name")
 */
class Division
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
     * @var Collection<DivisionGame>
     *
     * @ORM\OneToMany(targetEntity="DivisionGame", mappedBy="division");
     */
    private Collection $games;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->games = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<DivisionGame>
     */
    public function getGames(): Collection
    {
        return $this->games;
    }
}
