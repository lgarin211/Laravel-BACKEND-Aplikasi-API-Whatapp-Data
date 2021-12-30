<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DagurController extends Controller
{
    public function sending()
    {
        $data=DB::table('dagurs')->get();
        foreach ($data as $key => $value) {
            $nomor=$value->nomor;
            $pesan='hallo '.$value->nama_Guru.' kami mengingatkan anda untuk melakukan absensi di https://pjj.smkn4bogor.sch.id/login/index.php ';
            $response = Http::get('http://172.16.14.250/WhatsappAPI-php-class/?nomor='.$nomor.'&pesan='.$pesan);
            // dump($value->nama_Guru,'berhasil');
        }
    }
}