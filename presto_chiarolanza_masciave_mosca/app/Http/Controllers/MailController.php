<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RevisorApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function revisorApplication(Request $request)
    {

        $email = $request->email;
        $body = $request->body;
        $user = Auth::user();

        $revisorMail = new RevisorApplication($email, $body, $user);

        Mail::to('admin@presto.it')->send($revisorMail);

        return redirect()->back()->with('success', __('ui.richiestaInviata'));
    }

    public function revisorForm()
    {
        return view('lavora-con-noi');
    }
}
