<?php
namespace Edel\KinerjaUnja;
use Auth;
use Illuminate\Support\Facades\Cookie;
use Psy\Util\Json;

class Endec{
    public function __construct()
	{
        #contruc
    }


    public static function en($str = null){

        $kunci = env('KINKEY','appkinerja3del');
        $hasil='';
        /*
        
        for ($i = 0; $i < strlen($str); $i++) {
            $karakter = substr($str, $i, 1);
            $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
            $karakter = chr(ord($karakter)+ord($kuncikarakter));
            $hasil .= $karakter;
        }
        */
        return base64_encode($str);
    
    }

    public static function dec($str) {
      
        $hasil = base64_decode($str);
        
       
        
        return $hasil;
    }

    

}