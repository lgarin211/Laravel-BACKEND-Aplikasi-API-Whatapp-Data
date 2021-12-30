<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DagurController extends Controller
{
    
    public function sending()
    {

        $response = Http::get('https://api.telegram.org/bot5088921065:AAGnV63SM7g4l5gllimnIoZHymBuEh9GovM/getUpdates');
        $data=$response->json()['result'];
        $chat=[];
        foreach ($data as $key => $value) {
            $chat[$value['message']['from']['id']]['id']=$value['message']['from']['id'];
            $chat[$value['message']['from']['id']]['first_name']=$value['message']['from']['first_name'];
        }
        foreach ($chat as $key => $value) {
            // dd($value);
            $this->push($value['id'],$value['first_name']);
        }
    
    }
    public function push($chatid,$name,$task='Presensi')
    {
        // $data=DB::table('dagurs')->get();
        // foreach ($data as $key => $value) {
            // $nomor=$value->nomor;
            $pesan='hallo '.$name.' kami mengingatkan anda untuk melakukan '.$task.' di www.google.com';
            // $response = Http::get('http://172.16.14.250/WhatsappAPI-php-class/?nomor='.$nomor.'&pesan='.$pesan);
            // dump($value->nama_Guru,'berhasil');
            
            $pesan = json_encode($pesan);
            $API = "https://api.telegram.org/bot5088921065:AAGnV63SM7g4l5gllimnIoZHymBuEh9GovM/sendmessage?chat_id=".$chatid."&text=$pesan";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_URL, $API);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result; 
        // }
    }
}
