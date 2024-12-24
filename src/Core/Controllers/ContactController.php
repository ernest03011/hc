<?php 

declare(strict_types=1);

namespace App\Core\Controllers;

use App\Core\View;
use App\Core\Request;
use App\Core\Validator;
use App\Interfaces\EmailInterface;

class ContactController{

  public function __construct(
    private EmailInterface $mail,
    protected Validator $validator
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

    // $errors = $this->validator->getValidationErrors($data);

    // if (! empty($errors))
    // {
    //   return View::make('error/422');
    // }

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

}