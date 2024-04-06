<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;

class EmailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\EmailSender', function ($app) {
            $mailer = new PHPMailer(true);
            $mailer->isSMTP();
            $mailer->CharSet = 'UTF-8';
            $mailer->Host = config('mail.mailers.smtp.host');
            $mailer->SMTPAuth = true;
            $mailer->Username = config('mail.mailers.smtp.username');
            $mailer->Password = config('mail.mailers.smtp.password');
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mailer->Port = config('mail.mailers.smtp.port');
            $mailer->setFrom(config('mail.from.address'), config('mail.from.name'));
            
            return new \App\Services\EmailSender($mailer);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
