<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Attachment;

class welcomeemail extends Mailable
{
    use Queueable, SerializesModels;

    // public $mailMessage;
    // public $subject;
    // private $details;

    public $request;
    public $fileName;

    /**
     * Create a new message instance.
     */
    public function __construct($request,$fileName)  // The value comes in constrctor from EmailController
    {
        // $this->mailMessage = $message;
        // $this->subject = $subject;
        // $this->details = $details;

        $this->request = $request;
        $this->fileName = $fileName;
    }

    /**
     * Get the message envelope.
     * Return Subject
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form',        //If we write subject in this class then use this line 
            // I have already create subject in My Controller and pass them in this class as a parameter in constructor
            // subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     * Return View Or Text file
     */
    public function content(): Content
    {
        return new Content(
            // view: 'view.name',   same for view 
            view: 'mail.welcome_mail', 
            
            //If we want to send only Text the use
            // text :  'mail.welcome_mail',    // -> Inside this view file just use {{$mailMessage}}

            // If the datamember is private or protected the use with
            // with:[
            //     'name' => $this->details['name'],
            //     'product' => $this->details['product'],
            //     'price' => $this->details['price'],
            // ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // return [];
        // Create an array
        $attachments = [];

        if($this->fileName){
            $attachments = [
                Attachment::fromPath(public_path('/uploads/'.$this->fileName))
            ];
        }

        return $attachments;
    }
}
