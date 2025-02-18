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

   public function contactForm(){
      return view('contact_form');
   }

   public function sendcontactForm(Request $request){
      $request->validate([
         'name'=> 'required',
         'email'=> 'required|email',
         'subject'=> 'required|min:5|max:100',
         'message'=> 'required|min:10|max:255',
         'attachment'=> 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120',
      ]);

      $fileName = time() . "." .$request->file('attachment')->extension();
      $request->file('attachment')->move('uploads', $fileName);

      $toEmail = 'abdulrehmankhan5000@gmail.com';
      
      $response= Mail::to($toEmail)->send(new welcomeemail($request->all(),$fileName));

      if($response){
         return back()->with('success','Email Send Successfully');
      }else{
         return back()->with('error','Error occurs while send Email');
      }
   }
}
