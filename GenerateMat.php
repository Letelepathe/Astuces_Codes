<?php


class GenerateMat
{
    private static $alpha='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private static $numeric='0123456789';
    public static function createMat()
    {
          $alpha='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $numeric='0123456789';
        $mat='';
        for($i=0;$i<8;$i++)
        {
            $mat=$mat.self::$alpha[rand(0,strlen($alpha)-1)];
            if($i==3)
            {
                $mat=$mat.self::$numeric[rand(0,strlen($numeric)-1)];
            }
            
        }
        return $mat;
    }

    public static function MatWithNumber()
    {
        $mat='';
        for($i=0;$i<8;$i++)
        {
                $mat=$mat.self::$numeric[rand(0,strlen($numeric)-1)];
            if($i==7)
            {
                $mat=$mat.self::$alpha[rand(0,strlen($alpha)-1)]; 
            }
            
        }
        return $mat;
    }

}