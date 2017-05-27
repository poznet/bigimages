<?php
function human_filesize($bytes, $decimals = 2) {
    $factor = floor((strlen($bytes) - 1) / 3);
    if ($factor > 0) $sz = 'KMGT';
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor - 1] . 'B';
}
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
            $before=filesize($file);
            $img= \Intervention\Image\ImageManagerStatic::make($file);
            $img->resize($w, $h , function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $result = $img->save($file);
            $after=$img->filesize();
            $img->destroy();
            unset($img);

            $tab[$file] = $result;

            $aftertab[$file] = human_filesize($after,2);
            $beforetab[$file] = human_filesize($before,2);
            $diff+=($before-$after);

        }

    }
}
echo $twig->render('resize.twig',[
    'session'=>$session,
    'files'=>$tab,
    'before'=>$beforetab,
    'after'=>$aftertab,
    'diff'=> human_filesize($diff)
]);
