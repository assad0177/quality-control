<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Mail\Mailable as MailMailable;

class MailController extends Controller
{
//     public function sendEmail()
//     {
//         $details=[
//             'title'=>'Title from Mail Controller  in App\Http\Controller\MailController ',
//             'body'=>'Body from Mail Controller  in App\Http\Controller\MailController '
//         ];

//          Mail::to("assadtawakal521832@gmail.com")->send(new TestMail($details));
//         return "Email Sent";


//     }
}
