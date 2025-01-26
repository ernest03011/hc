<?php

declare(strict_types=1);

namespace App\Core;

class Request
{

    public function __construct(
        private ?array $get = null,
        private ?array $post = null,
        private array $server
    ) {
    }

    public function post(string $key, $default = null)
    {
        return $this->post[$key] ?? $default;
    }

    public function get(string $key, $default = null)
    {
        return $this->get[$key] ?? $default;
    }

    public function server(string $key, $default = null)
    {
        return $this->server[$key] ?? $default;
    }
  
    public function allPost(): array
    {
        return $this->post;
    }

    public function ip(): string
    {
        return $this->server['REMOTE_ADDR'] ?? '0.0.0.0';
    }

}
