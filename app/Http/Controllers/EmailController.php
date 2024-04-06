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
                return back()->with('failed', $send['error'])->withErrors($send['errorInfo']);
            } else {
                return back()->with('error', $send['error']);
            }
        } else {
            return back()->with('success', __('email.info.delivery_success'));
        }
    }
}
