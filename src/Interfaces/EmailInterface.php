<?php 

declare(strict_types=1);

namespace App\Interfaces;

interface EmailInterface{

  public function send(array $data) : bool;

}
