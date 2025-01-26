<?php 

declare(strict_types=1);

namespace App\Core;

use App\Exceptions\EmailException;
use App\Interfaces\EmailInterface;
use PHPMailer\PHPMailer\PHPMailer;
use App\Factories\PHPMailerFactory;

class Mailer implements EmailInterface
{

    private PHPMailer $mailer;
    private array $smtpConfig;

    public function __construct(
        private PHPMailerFactory $mailerFactory,
        private Env $config
    ) {
        $this->mailer = $this->mailerFactory->createPHPMailer();

        $this->smtpConfig = $this->config->smtp ?? [];

        $this->configureMailer();
    }

    public function send(array $data) : bool
    {

        try {
    
            $this->mailer->clearAddresses();
            $this->mailer->clearReplyTos();

            $this->mailer->addReplyTo(
                $data["email"] ?? "", 
                $this->data['name'] ?? ""
            );
            $this->mailer->addAddress(
                $this->smtpConfig['ReceiverAddress'], 
                $this->data['name'] ?? ""
            );

            $this->mailer->Subject = $data['subject'] ?? '';
            $this->mailer->Body = $data['message'] ?? '';

            if(!$this->mailer->send()) {
                  throw new EmailException("Error Processing Request");   
            }

            return true;

        } catch (EmailException | \Throwable $e) {
            return false;
        }


    }

    private function configureMailer(): void
    {

        $this->mailer->isSMTP();
    
        $this->mailer->SMTPDebug = $this->smtpConfig['debug']       ?? 0;
        $this->mailer->Host = $this->smtpConfig['host']             ?? '';
        $this->mailer->Port = $this->smtpConfig['port']             ?? 587;
        $this->mailer->SMTPSecure = $this->smtpConfig['encryption'] ?? PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->SMTPAuth = $this->smtpConfig['auth']         ?? true;
        $this->mailer->Username = $this->smtpConfig['username']     ?? '';
        $this->mailer->Password = $this->smtpConfig['password']     ?? '';


        $this->mailer->setFrom(
            $this->smtpConfig['setFrom'] ?? 'no-reply@example.com', 
            $this->smtpConfig['name'] ?? "No reply"
        );     

    }
}
