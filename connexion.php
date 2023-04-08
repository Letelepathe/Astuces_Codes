<?php

class Connexion{
    public static function  getconnexion()
    {
      try
        {
            $con=new PDO("mysql:dbname=biblio;host=localhost","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(ExceptionPDO $e)
        {
            die("<div style='color:red ; padding:50px 100px'>Connexion Echouer".$e->getMessage()."</div>");
        }

        return $con;
    }
}

