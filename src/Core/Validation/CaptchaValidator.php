<?php

declare(strict_types=1);

namespace App\Core\Validation;

use App\Core\APIService;
use App\Core\Enums\CaptchaValidationType;

class CaptchaValidator
{

    private string $errorMsg;

    public function __construct(
        private APIService $api
    ) { 
    }

    public function validateToken(
        string $captchaToken, 
        array $requestData, 
        string $verificationUrl, 
        float $threshold = 0.5
    ) : bool {
        if(empty($captchaToken)) {
            $this->errorMsg = CaptchaValidationType::MISSING_TOKEN->value;
            return false;
        }
    
        $response = $this->api->execute($verificationUrl, $requestData);
        $responseData = [];
    
        if (empty($response)) {
            $this->errorMsg = CaptchaValidationType::UNABLE_TO_EXECUTE_CAPTCHA_VALIDATION_REQUEST->value;
            return false;    
        }

        $responseData = json_decode($response, true);

        if($responseData["success"] === false) {
            $this->errorMsg = CaptchaValidationType::UNABLE_TO_EXECUTE_CAPTCHA_VALIDATION_REQUEST->value;
            return false;    
        }

        $score = (float) ($responseData['score'] ?? 0);
        if($score < $threshold) {
            $this->errorMsg = CaptchaValidationType::LOW_SCORE->value;
            return false;  
        }

        return true;
    }

    public function getErrorMsg() : string
    {
        return $this->errorMsg ?? "";
    }

}
