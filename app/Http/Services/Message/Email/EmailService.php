<?php

namespace App\Http\Services\Message\Email;

use Illuminate\Support\Facades\Mail;
use App\Http\Interfaces\MessageInterface;


class EmailService implements MessageInterface
{
    private $details;
    private $subject;
    private $from = [
        'address' => null,
        'name' => null,
    ];
    private $to;

    public function fire()
    {
        Mail::to($this->to)->send(new MailViewProvider($this->details, $this->subject , $this->from));
        return true;
    }



    // geter and seter for details property
    ///////////////////////////////////
    // get method for details property
    public function getDetails()
    {
        return $this->details;
    }


    // set method for details property
    public function setDetails($details)
    {
        $this->details = $details;
    }

    

    // geter and seter for subject property
    ///////////////////////////////////
    // get method for subject property
    public function getSubject()
    {
        return $this->subject;
    }


    // set method for subject property
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    

    // geter and seter for from property
    ///////////////////////////////////
    // get method for from property
    public function getFrom()
    {
        return $this->from;
    }


    // set method for from property
    public function setFrom($address, $name)
    {
        $this->from = [
            [
                'address'    => $address,
                'name'       => $name
            ]
        ];
    }

    

    // geter and seter for to property
    ///////////////////////////////////
    // get method for to property
    public function getTo()
    {
        return $this->to;
    }


    // set method for to property
    public function setTo($to)
    {
        $this->to = $to;
    }

}


?>