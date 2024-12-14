<?php 

declare(strict_types=1);

namespace App\Core;

use App\Exceptions\EmailException;
use App\Interfaces\EmailInterface;
use PHPMailer\PHPMailer\PHPMailer;

class ContactForm implements EmailInterface{

  public function __construct(
    private PHPMailer $mailer, 
    private Env $config, 
    private array $data
  ) {
    
  }

  public function send() : bool
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
                "{$smtp['setFrom']}", 
                $smtp['name'] ?? ""
              );
      $this->mailer
              ->addReplyTo(
                "{$this->data["email"]}" ?? "", 
                $this->data['name'] ?? ""
              );
      $this->mailer
              ->addAddress(
                "{$smtp['SMTP_RECEIVER_ADDRESS']}", 
                $this->data['name'] ?? ""
              );
      $this->mailer->Subject = 'Countless moments in Paradise.';
      $this->mailer->Body = $this->data['message'];

      $this->mailer->send();

      return true;

    } catch (EmailException $e) {
      return false;
    }


  }
}