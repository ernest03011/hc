<?php

declare(strict_types=1);

namespace App\Core\Validation;

use App\Core\APIService;
use App\Core\Env;
use App\Core\Request;

class CaptchaValidator{

  private string $errorMsg;

  public function __construct(
    private Env $config,
    protected Request $request,
    private APIService $api
  ) 
  { 
  }

  public function validateToken(string $token) : bool
  {
    if(empty($token))
    {
      $this->errorMsg = "No token provided";
      return false;
    }

    $captchaResp = $this->request->post('g-recaptcha-response');
    $secretKey = $this->config->captcha['secretKey'];
    $verificationUrl = $this->config->captcha['verificationUrl'];

    $resqData = array(
        'secret' => $secretKey,
        'response' => $captchaResp,
        'remote_ip' => $this->request->ip(),
    );

    $response = $this->api->execute($verificationUrl, $resqData);
    $response_data = [];

    if ($response == false) {

      $this->errorMsg = 'Ups! There was an error, try again!';
      return false;
      
    }

    $response_data = json_decode($response, true);
    if($response_data["success"] == false){
      
      $this->errorMsg = "Something went wrong. Refresh/reload the page and try after 2 minutes!";
      return false;
    }else{
        
        return true;
    }

    $this->errorMsg = "default";
    return false;

  }

  private function getErrorMsg() : string
  {
    return $this->errorMsg ?? "";
  }

}