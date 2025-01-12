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
use App\Interfaces\EmailInterface;
use App\Interfaces\ValidatorInterface;
use App\Core\Enums\validationType;
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
        'ig' => $this->config->social['ig'],
        'airbnb' => $this->config->social['airbnb']
      ]
    );
  }

  #[Post('/contact')]
  #[Route('/contact', HttpMethod::Head)]
  public function handleFormSubmition(Request $request): View
  {
   // Check result from the catpcha - Calling captcha validator (dependency)
   $token = $request->post('g-recaptcha-response');
   $tokenStatus = $this->captchaValidator->validateToken($token);

   // Send email if score is middle to high - (SendEmail method)

   if($tokenStatus)
   {
    return $this->sendEmail($request);
   }  
    // Send a message letting the user know there has been an error if the score is low
        // return a view with this error, maybe the same contact page and the error message. 
  }

  private function sendEmail(Request $request) : View
  {

    $eventMsg = '';

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

    $status = $this->mail->send($data);

    $eventMsg = 
      $status 
        ? 'Email has been sent' 
        : "Someting went wrong, send the email again";

    return View::make(
      'contact.view',
      [
        'message' => $eventMsg
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