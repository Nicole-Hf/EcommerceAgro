<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Correo de Carol para Carol',
            'body' => 'confirma el correo'
        ];
        Mail::to("quintanavargascarolselena@gmail.com")->send(new TestMail($details));
        return "correo enviado";
    }
}