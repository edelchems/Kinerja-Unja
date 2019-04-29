<?php
namespace Edel\KinerjaUnja;

class UrlKinerja{
    public function __construct()
	{
        #contruc
    }

    public static function url($dataset = null){
        return "http://delcode.id:5050/kinerja/sendkegiatan";
        
    }
}