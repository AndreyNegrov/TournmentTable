<?php

declare(strict_types=1);

namespace App\Team\Infrastructure\Controller\Request;

use App\Shared\Infrastructure\ArgumentResolver\RequestObjectInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class ChangeTeamRatingRequest implements RequestObjectInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Type(
     *    type="integer",
     *    message="The value {{ value }} is not a valid {{ type }}."
     *  ),
     * @Assert\Range(min="1")
     */
    private int $teamId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="int")
     * @Assert\Range(min="1")
     */
    private int $rating;

    public function __construct(Request $request)
    {
        $json = $request->query->all();

        $this->teamId = $json['team_id'] ?? null;
        $this->rating = $json['rating'] ?? null;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getRating(): int
    {
        return $this->rating;
    }
}
