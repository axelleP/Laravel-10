<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;

class PHPMailerController extends Controller
{
    public function subscribeNewsletter(Request $request) {
        $mail = new PHPMailer(true);

        try {
            $error = __('email.info.delivery_failed');
            if (!filter_var($request->emailRecipient, FILTER_VALIDATE_EMAIL)) {
                $error = __('email.info.invalid_address_email');
                throw new Exception($error);
            }

            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = env('MAIL_PORT');
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->emailRecipient);
            $mail->isHTML(true);
            $mail->Subject = __('email.content.subject', ['app_name' => env('APP_NAME')]);
            $mail->Body = view('email-newsletter')->render();

            if (!$mail->send()) {
                return back()->with('failed', $error)->withErrors($mail->ErrorInfo);
            } else {
                return back()->with('success', __('email.info.delivery_success'));
            }
        } catch (Exception $e) {
            report($e->getMessage());
            return back()->with('error', $error);
        }
    }
}
