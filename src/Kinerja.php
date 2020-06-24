<?php
namespace Edel\KinerjaUnja;
use Auth;
use \Cookie;
use Datetime;

class Kinerja{
    public function __construct()
	{
        #contruc
    }


    public static function post($dataset = null){
        $data=array();
        if($dataset !==null){
            $pecahdata=explode(";",$dataset);
            $ipe=0;
        

            foreach($pecahdata as $val){
                if($ipe==0){
                    $data['appdataset']['keterangan']=$val;
                }

                if($ipe==1){
                    $method=$val;
                }

                if($ipe==2){
                    $data['appdataset']['kategori']=$val;
                }
                
                if($ipe==3){
                    $data['appdataset']['status']=$val;
                }

                if($ipe==4){
                    $data['appdataset']['rate']=$val;
                }

                $ipe++;
            }

            $datacookie=base64_encode(json_encode($data));
            setcookie('kindata',$datacookie,time()+3600);
        }else{
            setcookie('kindata','',time()-3600);
        }
    }

    

}