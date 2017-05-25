<?php
namespace Poznet\mini;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

require('vendor/autoload.php');
$request=Request::createFromGlobals();
$session=$request->getSession();
if(!$session) $session=new Session();
$session->start();
$loader = new \Twig_Loader_Filesystem(__DIR__.'/tpl');
$twig = new \Twig_Environment($loader);

$id=$request->get('id');

switch ($id){
    case '1':
       include('inc/find.php');
    break;
    case '2':
        include('inc/optymize.php');
        break;
    default:
        include('inc/form.php');
    break;
}

