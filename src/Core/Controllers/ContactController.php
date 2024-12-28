<?php 

declare(strict_types=1);

namespace App\Core\Controllers;

use App\Core\View;
use App\Core\Request;
use App\Core\Validation\validationType;
use App\Core\Validator;
use App\Interfaces\EmailInterface;
use App\Interfaces\ValidatorInterface;

class ContactController{

  public function __construct(
    private EmailInterface $mail,
    protected ValidatorInterface $validator
  ) {
  }

  public function index() : View

  {
    return View::make('contact.view');
  }

  public function sendEmail(Request $request) : View
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