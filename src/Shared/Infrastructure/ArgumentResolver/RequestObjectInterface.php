<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\ArgumentResolver;

use Symfony\Component\HttpFoundation\Request;

interface RequestObjectInterface
{
    public function __construct(Request $request);
}
