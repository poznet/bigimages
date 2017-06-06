<?php

$diff=0;
$tab=[];
$aftertab=[];
$beforetab=[];
$files=$request->get('files');
if(($request->getMethod()=="POST") && (count($files)>0)) {
$w=null;
$h=null;
    if($session->get('resize-param')=='width') $w=$session->get("resize-amount");
    if($session->get('resize-param')=='height') $h=$session->get("resize-amount");



    foreach ($files as $file => $status) {
        if ($status == 'on') {

            $result=true;

            $tab[$file] = $result;


        }

    }
}
echo $twig->render('resize.twig',[
    'session'=>$session,
    'files'=>$tab,

]);
