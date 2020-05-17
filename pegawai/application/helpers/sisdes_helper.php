<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset')) {
    function asset($path = NULL){
        return base_url("assets/$path");
    }
}


if (!function_exists('urlNik')) {
    function urlNik(){
        return base_url("api/carinik/");
    }
}


if(!function_exists('cariNikJson')){
    function cariNikJson($nik = NULL){

        if($nik == NULL){
            $CI = &get_instance();
            $nikParam = $CI->input->get('nik');
            $nik = $nikParam;
        }
    	
		$url = "http://durenmas.banjarnegarakab.go.id:8081/ws_server/get_json/10_wanadadi/carinik?USER_ID=PRATAMAYUDHASANTOSA&PASSWORD=10_wanadadi&NIK=$nik";	
		$client = new \GuzzleHttp\Client();
        $response = $client->request(
            "GET",
            $url
        );
        $data = json_decode($response->getBody());
        if(!isset($data->content->RESPON)){
            //ketemu
            $data->respon_code      = 1;     
            $data->respon_message   = "Data Ditemukan";
        } else {
            //ga ketemu
            $data->respon_code = 0;
            $data->respon_message   = "Data Tidak Ditemukan";
        }
        return json_encode($data);
    }
}

