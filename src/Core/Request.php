<?php

declare(strict_types=1);

namespace App\Core;

class Request{

  public function __construct(
    private array $get,
    private array $post,
    private array $server
  ) {
  }

  public function post(string $key, $default = null){
    return $this->post[$key] ?? $default;
  }

  public function get(string $key, $default = null){
    return $this->get[$key] ?? $default;
  }

  public function server(string $key, $default = null){
    return $this->server[$key] ?? $default;
  }

}