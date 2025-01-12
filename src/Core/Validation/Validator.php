<?php

declare(strict_types=1);

namespace App\Core\Validation;

use App\Interfaces\ValidatorInterface;
use App\Core\Enums\ValidationType;

class Validator implements ValidatorInterface{

  public function validate(mixed $value, ValidationType $type, mixed $options = null ): bool
  {

    return match ($type){
      ValidationType::REQUIRED => $this->validateRequired($value),
      ValidationType::EMAIL => $this->validateEmail($value),
      ValidationType::NUMERIC => $this->ValidateNumeric($value),
      ValidationType::MAX_LENGTH => $this->validateMaxLength($value, $options),
    };

  }

  private function validateRequired(mixed $value) : bool
  {
    return !empty($value);
  }

  private function validateEmail(mixed $value) :  bool
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
  }

  private function ValidateNumeric(mixed $value) : bool
  {
    return is_numeric($value);
  }

  private function validateMaxLength(mixed $value, ?int $maxLength) : bool
  {
    if(!is_int($maxLength))
    {
      return  true;
    }

    return mb_strlen($value) <= $maxLength;
  }


}