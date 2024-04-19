<?php

use Src\Signature;

require_once __DIR__ . '/src/Signature.php';

$signature = new Signature();

$image = imagecreatefromjpeg('signature.jpg');

$signature->detect($image);

$signature->save(__DIR__ . '/signature.png');

