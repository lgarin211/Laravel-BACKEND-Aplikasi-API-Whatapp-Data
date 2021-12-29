<?php
include('WhatsappAPI.php'); // include given API class and update API credentials in it
if (!empty($_GET['nomor'])) {
    $obj = new WhatsappAPI; // create an object of the WhatsappAPI class
    $status = $obj->send('+'.$_GET['nomor'], $_GET['pesan']); // NOTE: Phone Number should be with country code
    
    $status = json_decode($status);
    print_r($status);
}else {
    echo 'gagal parameter kurang';
}
?>