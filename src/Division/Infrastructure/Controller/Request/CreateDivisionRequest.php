<?php

declare(strict_types=1);

namespace App\Division\Infrastructure\Controller\Request;

use App\Shared\Infrastructure\ArgumentResolver\RequestObjectInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class CreateDivisionRequest implements RequestObjectInterface
{
    /**
     * @Assert\NotBlank(),
     * @Assert\Type(
     *    type="string",
     *    message="The value {{ value }} is not a valid {{ type }}."
     *  ),
     * @Assert\Length(
     *     min=1,
     *     max=20,
     *     exactMessage="Property should have exactly {{ limit }} characters.",
     *     allowEmptyString=false
     *  )
     */
    private string $divisionName;

    public function __construct(Request $request)
    {
        $json = $request->query->all();

        $this->divisionName = $json['division_name'] ?? null;
    }

    public function getDivisionName(): string
    {
        return $this->divisionName;
    }
}
