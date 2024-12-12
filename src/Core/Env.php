<?php 

declare(strict_types=1);

namespace App\Core;

class Env{

  protected array $config = [];

  public function __construct(array $env)
  {
    $this->config = [
      'smtp' => [

      ],
      'social' => [

      ]
    ];
  }

  public function _get(string $name) : array | null
  {
    return $this->config[$name] ?? null;
  }
  
}