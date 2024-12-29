<?php 

declare(strict_types=1);

namespace App\Core;

class Env{

  protected array $config = [];

  public function __construct(array $env)
  {
    $this->config = [
      'smtp' => [
        'name' => $env['SMTP_NAME'],
        'debug' => $env['SMTP_DEBUG'],
        'host' => $env['SMTP_HOST'],
        'port' => $env['SMTP_PORT'],
        'encryption' => $env['SMTP_SECURE'],
        'auth' => $env['SMTP_AUTH'],
        'username' => $env['SMTP_USERNAME'],
        'password' => $env['SMTP_PASSWORD'],
        'setFrom' => $env['SMTP_SET_FROM'],
        'addReplyTo' => $env['SMTP_ADD_REPLY_TO'],
        'ReceiverAddress' => $env['SMTP_RECEIVER_ADDRESS'],
        
      ],

      'social' => [
        'ig' => $env['SOCIAL_IG_URL'],
        'airbnb' => $env['SOCIAL_AIRBNB_URL']
      ], 
      'view' => [
        'path' => $env['VIEW_PATH']
      ], 
      'storage' => [ 
        'path' => $env['STORAGE_PATH']
      ]
    ];
  }

  public function __get(string $name) : array | null
  {
    return $this->config[$name] ?? null;
  }
  
}