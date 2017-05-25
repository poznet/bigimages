<?php

$tab=[];
$files=$request->get('files');
if(($request->getMethod()=="POST") and (count($files)>0)) {
    \Tinify\Tinify::setKey($session->get('api'));
    foreach ($files as $file => $status) {
        if ($status == 'on') {
            $source = Tinify\fromFile($file);
            $result = $source->toFile($file);
            $tab[$file] = $result;
        }

    }
}
echo $twig->render('optymize.twig',['session'=>$session,'files'=>$tab]);
