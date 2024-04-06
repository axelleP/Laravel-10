<?php
 
namespace App\Services;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;

class EmailSender
{
    protected $mailer;

    public function __construct(PHPMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendWelcomeNewsletter(?string $emailRecipient)
    {
        try {
            $error = __('email.info.delivery_failed');
            if (!filter_var($emailRecipient, FILTER_VALIDATE_EMAIL)) {
                $error = __('email.info.invalid_address_email');
                throw new Exception($error);
            }

            $this->mailer->addAddress($emailRecipient);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = __('email.content.subject', ['app_name' => config('app.name')]);
            $this->mailer->Body = view('email-welcome-newsletter')->render();

            if (!$this->mailer->send()) {
                return [
                    'isSend' => false,
                    'error' => $error,
                    'errorInfo' => $this->mailer->ErrorInfo
                ];
            } else {
                return ['isSend' => true];
            }
        } catch (Exception $e) {
            report($e->getMessage());
            return [
                'isSend' => false,
                'error' => $error
            ];
        }
    }
}