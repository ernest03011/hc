<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Core\Validation\ValidationType;


interface ValidatorInterface{

  public function validate(mixed $value, ValidationType $type, mixed $options = null ) : bool;

}