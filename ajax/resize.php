<?php

use Symfony\Component\HttpFoundation\Session\Session;

require '../vendor/autoload.php';
require('../inc/functions.php');

$request=\Symfony\Component\HttpFoundation\Request::createFromGlobals();
$session=$request->getSession();
if(!$session) $session=new Session();
$session->start();

$w=null;
$h=null;
if($session->get('resize-param')=='width') $w=$session->get("resize-amount");
if($session->get('resize-param')=='height') $h=$session->get("resize-amount");

$file=$request->request->get('file');
$img= \Intervention\Image\ImageManagerStatic::make($file);
$img->resize($w, $h , function ($constraint) {
    $constraint->aspectRatio();
    $constraint->upsize();
});
$result = $img->save($file);
$after=$img->filesize();
$img->destroy();
unset($img);
if($result){
    echo 'Ok';
}else{
    echo 'ERROR';
}
