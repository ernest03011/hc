<?php 

declare(strict_types=1);

namespace App\Core\Controllers;

use App\Core\Env;
use App\Core\View;
use App\Core\Request;
use App\Core\Attributes\Get;
use App\Core\Attributes\Post;
use App\Core\Attributes\Route;
use App\Core\Enums\HttpMethod;
use App\Core\Enums\ValidationType;
use App\Exceptions\EmailException;
use App\Interfaces\EmailInterface;
use App\Interfaces\ValidatorInterface;
use App\Core\Validation\CaptchaValidator;

class ContactController{

  public function __construct(
    private EmailInterface $mail,
    protected ValidatorInterface $validator,
    private Env $config,
    private CaptchaValidator $captchaValidator
  ) {
  }

  #[Get('/contact')]
  #[Route('/contact', HttpMethod::Head)]
  public function index() : View
  {

    return View::make(
      'contact.view', 
      [
        'ig' => $this->config->social['ig'] ?? "#",
        'airbnb' => $this->config->social['airbnb'] ?? "#"
      ]
    );
  }

  #[Post('/contact')]
  #[Route('/contact', HttpMethod::Head)]
  public function handleFormSubmition(Request $request): View
  {
 
    $captchaResponse = $request->post('g-recaptcha-response');
    $secretKey = $this->config->captcha['secretKey'];
    $verificationUrl = $this->config->captcha['verificationUrl'];
    
    $requestData = array(
      'secret' => $secretKey,
      'response' => $captchaResponse,
      'remote_ip' => $request->ip(),
    );

    $tokenStatus = $this->captchaValidator->validateToken($captchaResponse, $requestData, $verificationUrl);

    if($tokenStatus)
    {
      return $this->sendEmail($request);
    }  

    return View::make(
      'contact.view',
        [
          'message' => $this->captchaValidator->getErrorMsg()
        ]
    );
  }

  private function sendEmail(Request $request) : View
  {

    $data = [
      'name' => $request->post('name'),
      'email' => $request->post('email'),
      'message' => $request->post('message')
    ];
    $isValid = $this->validate($data);
    if (! $isValid)
    {
      return View::make('error/422');
    }

    try {
      $this->mail->send($data);
    } catch (EmailException) {

      return View::make(
        'contact.view',
        [
          'message' => "Somethin went wrong, try again", 
          'messageType' => "error"
        ]
      );
    }

    return View::make(
      'contact.view',
      [
        'message' => "Email has been sent!",
        'messageType' => "success"
      ]
    );
  }

  private function validate($data) : bool
  {
    $isValid = false;

    $value1 = $data['name'];
    $isNameFieldEmpty = $this->validator->validate($value1, validationType::REQUIRED);

    $value2 = $data['email'];
    $isEmailFieldEmpty = $this->validator->validate($value2, validationType::REQUIRED);
    $isValidEmail = $this->validator->validate($value2, validationType::EMAIL);

    $value3 = $data['message'];
    $isBodyFieldEmpty = $this->validator->validate($value3, validationType::REQUIRED);

  
    if($isNameFieldEmpty && $isEmailFieldEmpty && $isValidEmail && $isBodyFieldEmpty)
    { 
      $isValid = true;
    } else
    {
      $isValid = false;
    }   
  
    return $isValid;
  }
}