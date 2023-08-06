<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function basic_email() {
        $name = "Lê Thành An";
        $auth_code = "12345";
        $expire_minutes = "10";

        Mail::send('emails.madangnhap', compact("name", "auth_code", "expire_minutes"), function($email){
           $email->subject("Mã đăng nhập hệ thống đồ án VKU");
           $email->to('hethongdoanvku@gmail.com', '');
        });


      
     }
}
