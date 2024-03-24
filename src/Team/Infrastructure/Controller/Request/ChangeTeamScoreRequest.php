<?php

declare(strict_types=1);

namespace App\Team\Infrastructure\Controller\Request;

use App\Shared\Infrastructure\ArgumentResolver\RequestObjectInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class ChangeTeamScoreRequest implements RequestObjectInterface
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
     * @Assert\Type(
     *    type="integer",
     *    message="The value {{ value }} is not a valid {{ type }}."
     *  ),
     * @Assert\Range(min="0")
     */
    private int $score;

    public function __construct(Request $request)
    {
        $json = $request->query->all();

        $this->teamId = $json['team_id'] ?? null;
        $this->score = $json['score'] ?? null;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}
