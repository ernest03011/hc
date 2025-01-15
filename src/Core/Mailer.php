<?php 

declare(strict_types=1);

namespace App\Core;

use App\Exceptions\EmailException;
use App\Interfaces\EmailInterface;
use PHPMailer\PHPMailer\PHPMailer;
use App\Factories\PHPMailerFactory;

class Mailer implements EmailInterface{

  private PHPMailer $mailer;

  public function __construct(
    private PHPMailerFactory $mailerFactory,
    private Env $config
  ) {
    $this->mailer = $this->mailerFactory->createPHPMailer();
  }

  public function send(array $data) : bool
  {
    $smtp = $this->config->smtp;
    try {

      $this->mailer->isSMTP();
      $this->mailer->SMTPDebug = $smtp['debug'];
      $this->mailer->Host = $smtp['host'];
      $this->mailer->Port = $smtp['port'];
      $this->mailer->SMTPSecure = $smtp['encryption'];
      $this->mailer->SMTPAuth = $smtp['auth'];
      $this->mailer->Username = $smtp['username'];
      $this->mailer->Password = $smtp['password'];
      $this->mailer
              ->setFrom(
                $smtp['setFrom'], 
                $smtp['name'] ?? ""
              );     
      $this->mailer
              ->addReplyTo(
                $data["email"] ?? "", 
                $this->data['name'] ?? ""
              );
      $this->mailer
              ->addAddress($smtp['ReceiverAddress'], 
                $this->data['name'] ?? ""
              );
      $this->mailer->Subject = 'Countless moments in Paradise.';
      $this->mailer->Body = $data['message'];

      $this->mailer->send();

      return true;

    } catch (EmailException $e) {
      return false;
    }


  }
}