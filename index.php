<?php
namespace Poznet\mini;

use Poznet\mini\twig\TwigRoundExtension;
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
    case '0':
        include('inc/form.php');
        break;
    case '1':
        include('inc/find.php');
        break;
    case '2':
        include('inc/optymize.php');
        break;
    case 'resize':
        include('inc/resize-form.php');
        break;
    case 'resizeresult':
        include('inc/resize-find.php');
        break;
    case 'resizeit':
        include('inc/resize-resize.php');
        break;
    default:
        include('inc/form.php');
        break;
}

