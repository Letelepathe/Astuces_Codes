<?php
class Session{
    private $cookies;
    private $val;
    private $typeSes;

    public function __construct($typeSes,$val) 
    {
        $this->val=$val;
        $this->typeSes=$typeSes;
    }

    public function session()
    {
        setcookie($this->typeSes,$this->val,time() + 3600,'/','',false,true);
        return (!empty($_COOKIE[$this->typeSes]))?$_COOKIE[$this->typeSes]:null;
    }

    public function unsession()
    {
         unset($_COOKIE[$this->typeSes]);
         setcookie($this->val,'',time() - 60,'/','',false,true);
    }
}