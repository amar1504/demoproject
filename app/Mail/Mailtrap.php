<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailtrap extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        //dd($this->data);

        if($this->data['flag']=='contact us for user')
        {
            return $this->view('mail/contactuscustomermail')->with('data', $this->data);
        }
        if($this->data['flag']=='contact us for admin')
        {
            return $this->view('mail/contactusadminmail')->with('data', $this->data);
        }
        if($this->data['flag']=='status for user')
        {
            return $this->view('mail/orderstatusmail')->with('data', $this->data);
        }
        if($this->data['flag']=='cutomer registaion')
        {
            return $this->view('mail/userregistrationmail')->with('data', $this->data);
        }
        if($this->data['flag']=='cutomer registaion for admin')
        {
            return $this->view('mail/registrationmailadmin')->with('data', $this->data);
        }
        else{
            return $this->view('Eshopper/mailbody')->with('data', $this->data);
        }
    }
}
