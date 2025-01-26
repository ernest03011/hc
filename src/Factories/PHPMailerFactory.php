<?php

declare(strict_types=1);

namespace App\Factories;

use PHPMailer\PHPMailer\PHPMailer;

class PHPMailerFactory
{

    public function createPHPMailer() : PHPMailer
    {
        $mailer = new PHPMailer(true);
        return $mailer;
    }
}
