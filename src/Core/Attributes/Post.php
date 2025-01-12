<?php

declare(strict_types=1);

namespace App\Core\Attributes;

use Attribute;
use App\Core\Enums\HttpMethod;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Post extends Route
{
  public function __construct(public string $routePath)
  {
    parent::__construct($routePath, HttpMethod::Post);
  }
  
}
