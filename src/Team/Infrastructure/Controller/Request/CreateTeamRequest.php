<?php

declare(strict_types=1);

namespace App\Team\Infrastructure\Controller\Request;

use App\Shared\Infrastructure\ArgumentResolver\RequestObjectInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class CreateTeamRequest implements RequestObjectInterface
{
    /**
     * @Assert\NotBlank(),
     * @Assert\Type(
     *    type="string",
     *    message="The value {{ value }} is not a valid {{ type }}."
     *  ),
     * @Assert\Length(
     *     min=1,
     *     max=30,
     *     exactMessage="Property should have exactly {{ limit }} characters.",
     *     allowEmptyString=false
     *  )
     */
    private string $teamName;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(
     *    type="integer",
     *    message="The value {{ value }} is not a valid {{ type }}."
     *  ),
     * @Assert\Range(min="1")
     */
    private int $divisionId;


    public function __construct(Request $request)
    {
        $json = $request->query->all();

        $this->teamName = $json['team_name'] ?? null;
        $this->divisionId = $json['division_id'] ?? null;
    }

    public function getTeamName(): string
    {
        return $this->teamName;
    }

    public function getDivisionId(): int
    {
        return $this->divisionId;
    }
}
