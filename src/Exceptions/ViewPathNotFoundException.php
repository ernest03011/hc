<?php 

declare(strict_types=1);

namespace App\Exceptions;

class ViewPathNotFoundException extends \Exception
{
  protected $message = 'View Path not set';
}