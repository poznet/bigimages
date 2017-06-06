<?php


require '../vendor/autoload.php';
require('../inc/functions.php');

$request=\Symfony\Component\HttpFoundation\Request::createFromGlobals();


if(!$request->request->has('file')){
    $response='ERROR';
} else{
    $file=$request->request->get('file');
    $size=filesize($file);
    $response=$size;
}




echo $response;