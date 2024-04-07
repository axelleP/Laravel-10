<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmailSender;

class EmailController extends Controller
{
    public function subscribeNewsletter(Request $request, EmailSender $emailSender) {
        $send = $emailSender->sendWelcomeNewsletter($request->emailRecipient);

        if (!$send['isSend']) {
            if (isset($send['errorInfo'])) {
                return back()->with('failed', $send['error_subscribeNewsletter'])->withErrors($send['errorInfo']);
            } else {
                return back()->with('error_subscribeNewsletter', $send['error']);
            }
        } else {
            return back()->with('success_subscribeNewsletter', __('email.info.delivery_success'));
        }
    }
}
