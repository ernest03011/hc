<?php

declare(strict_types=1);

namespace App\Core\Enums;

enum CaptchaValidationType: STRING
{
  case MISSING_TOKEN = "We encountered a problem; kindly reload your browser and attempt once more.";
  case LOW_SCORE = "An error has occurred; please refresh your browser and try again.";
  case UNABLE_TO_EXECUTE_CAPTCHA_VALIDATION_REQUEST = "Something isn’t right; reload your browser and give it another shot.";
}