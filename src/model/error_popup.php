<?php
  Class Popup{
    private $message;
    private $validate;
    private $cancel;

    function __construct($message, $vA, $cA){
      $this->message = $message;
      $this->validate =  $vA;
      $this->cancel = $cA;
    }

    public function getMessage(){
      return $this->message;
    }

    public function getValidate(){
      return $this->validate;
    }

    public function getCancel(){
      return $this->cancel;
    }

    public function setMessage($message){
      $this->message = $message;
    }

    public function setValidate($v){
      $this->validate = $v;
    }

    public function setCancel($c){
      $this->cancel = $c;
    }
  };
