<?php

namespace App\Http\Controllers;

use App\Mail\Welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
   public function sendMail(){
    $toEmail = "abdulrehmankhan5000@gmail.com";
    $message = "Hello Laptop Kaisi hai";
    $subject = "Testing Mail using Laravel";
    $details = [
      'name' => "Abdul Rahman",
      'product' => 'Test Product',
      'price' => '250'
    ];

    $request = Mail::to($toEmail)->send(new welcomeemail($message,$subject,$details));
    dd($request);


   //  How to send Mail to multiple users

   /* $emails = [
      'mail1',
      'mail2',
      'mail3',
      'mail4',
      'mail5'
   ];

   foreach($emails as $recipient){
      $request = Mail::to($recipient)->send(new welcomeemail($message,$subject,$details));
   } */

   }
}
