<?php

declare(strict_types=1);

namespace App\Core\Enums;

enum CaptchaValidationType: STRING
{
  case MISSING_TOKEN = "Something went wrong, reload the browser and try again!";
  case LOW_SCORE = "Something went wrong, reload the browser and try again!";
  case UNABLE_TO_EXECUTE_CAPTCHA_VALIDATION_REQUEST = "Something went wrong, reload the browser and try again!";
}