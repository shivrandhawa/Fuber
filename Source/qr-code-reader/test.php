<?php

require __DIR__ . "/vendor/autoload.php";
//require 'php-qrcode-detector-decoder-master/lib/QrReader.php';

$qrcode = new QrReader('image/hello_world.png');
$text = $qrcode->text(); //return decoded text from QR Cod

echo $text;

?>
