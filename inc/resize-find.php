<?php


if(!$request->getMethod()=="POST") {
    $session->getFlashBag()->add('error', 'Problem with the form - contact  support');
    $r = new \Symfony\Component\HttpFoundation\RedirectResponse('index.php');
    $r->send();
}



$session->set('dir',$request->get('dir'));
$session->set('filetypes',$request->get('filetypes'));
$session->set('size',$request->get('size'));
$session->set('stype',$request->get('stype'));

$session->set('resize-amount',$request->get('resize-amount'));
$session->set('resize-param',$request->get('resize-param'));





$finder=new \Symfony\Component\Finder\Finder();
$finder->files();
if($request->get('filetypes')!==null)
foreach ($request->get('filetypes') as $file){
    $finder->name($file);
}
$size='>='.$request->get('size').$request->get('stype');
$finder->size($size);
$finder->depth('<10')->in(__DIR__.'/../'. $request->get('dir'));



echo $twig->render('resize-find.twig',['session'=>$session,'files'=>$finder]);
