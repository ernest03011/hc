<?php

declare(strict_types = 1);

namespace App\Core\Attributes;

use Attribute;
use App\Core\Enums\HttpMethod;
use App\Interfaces\RouteInterface;

#[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
class Route
{
    public function __construct(public string $routePath, public HttpMethod $method = HttpMethod::Get)
    {
    }
}
