<?php

namespace App\Http\Services\Message\SMS;

use App\Http\Interfaces\MessageInterface;
use App\Http\Services\Message\SMS\MeliPayamakService;

class SmsService implements MessageInterface
{
    private $from;
    private $text;
    private $to; 
    private $isFlash = true;


    public function fire(){
        $meliPayamak = new MeliPayamakService(); 
        return $meliPayamak->sendSmsSoapClient($this->from, $this->to, $this->text, $this->isFlash);
    }
    

    // geter and seter for from property
    ///////////////////////////////////
    // get method for from property
    public function getFrom()
    {
        return $this->from;
    }
    
    
    // set method for from property
    public function setFrom($from)
    {
        $this->from = $from;
    }
    
    
    // geter and seter for text property
    ///////////////////////////////////
    // get method for Text property
    public function getText()
    {
        return $this->text;
    }
    
    
    // set method for Text property
    public function setText($text)
    {
        $this->text = $text;
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
    
    

    // geter and seter for isFlash property
    ///////////////////////////////////
    // get method for isFlash property
    public function getIsFlash()
    {
        return $this->isFlash;
    }
    
    
    // set method for isFlash property
    public function setIsFlash($isFlash)
    {
        $this->isFlash = $isFlash;
    }
}


?>