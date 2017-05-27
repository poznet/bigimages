<?php


if(!$request->getMethod()=="POST") {
    $session->getFlashBag()->add('error', 'Problem with the form - contact  support');
    $r = new \Symfony\Component\HttpFoundation\RedirectResponse('index.php');
    $r->send();
}


$session->set('api',$request->get('api'));
$session->set('dir',$request->get('dir'));
$session->set('filetypes',$request->get('filetypes'));
$session->set('size',$request->get('size'));
$session->set('stype',$request->get('stype'));



$finder=new \Symfony\Component\Finder\Finder();
$finder->files();
if($request->get('filetypes')!==null)
foreach ($request->get('filetypes') as $file){
    $finder->name($file);
    $finder->name(strtoupper($file));
}
$size='>'.$request->get('size').$request->get('stype');
$finder->size($size);
$finder->depth('<10')->in(__DIR__.'/../'. $request->get('dir'));



echo $twig->render('find.twig',['session'=>$session,'files'=>$finder]);
