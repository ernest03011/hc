<?php

declare(strict_types=1);

namespace App\Core\Enums;

enum validationType: string 
{
  case REQUIRED = 'required';
  case EMAIL = 'email';
  case NUMERIC = 'numeric';
  case MAX_LENGTH = 'max_length';
}