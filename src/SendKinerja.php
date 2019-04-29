<?php
namespace Edel\KinerjaUnja;

class SendKinerja{
    public function __construct()
	{
        #contruc
    }


    public static function post($dataset = null){

        if($dataset==null){
            $out=array('err'=>'Data tidak boleh kosong');
            return $out;
        }else{
            $obj = json_decode($dataset);
            if($obj === null) {
                $out=array('err'=>'Data Tidak dalam format json');
                return $out;

            }else{
                $client = new \GuzzleHttp\Client();
                if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
                    $link = "https"; 
                    $uri = "https"; 
                }else{
                    $link = "http"; 
                    $uri = "https"; 
                }
                
                $link .= "://".$_SERVER['HTTP_HOST']; 
                $uri .= "://".$_SERVER['REQUEST_URI']; 
                $key=env('KINKEY',null);

                //validasi data
                $errdata=array();

                if(empty($obj->username)){
                    $errdata[]="variabel username harus diisi (sesuaikan dengan username siakad)";
                }

                if(empty($obj->kategori)){
                    $errdata[]="variabel kategori harus";
                }

                if(empty($obj->kegiatan)){
                    $errdata[]="variabel kegiatan harus diisi ";
                }

                if(count($errdata)>0){
                    $err['err']=array($errdata);
                    return $err;
                }else{

                    $dataket=array('urlapp'=>$link,'keyapp'=>$key,'uri'=>$uri);

                    $objarr=(array)$obj;
                    $kirimdata=array_merge($dataket,$objarr);
                    
                try{
                    $res = $client->post(UrlKinerja::url(), [
                            'form_params' => $kirimdata
                    ]);
                    $data_server=json_decode($res->getBody());
                    
                    return $data_server;

                } catch (\Exception $ex){
                }
            }
            }
        }
        
    }
}