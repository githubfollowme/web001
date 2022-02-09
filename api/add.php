<!--  簡化新增的api為addd.php,並套用新增功能到其他的功能去 -->
<?php

include  "../base.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}else{
    // $DB 要確認 如果不是 admin 也同時 不為menu的資料表的話
    if($DB->table!='admin' && $DB->table!='menu'){
        // img欄位爲空
        $data['img']='';
    }
}


switch($DB->table){
    case "title":
        $data['text']=$_POST['text'];
        $data['sh']=0;
    break;
    case "admin":
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
    break;
    case "menu":
        $data['name']=$_POST['name'];
        $data['href']=$_POST['href'];
        $data['sh']=1;
        $data['parent']=0;
    break;
    default:
        $data['text']=$_POST['text']??'';
        $data['sh']=1;
    break;

}

$DB->save($data);
to("../back.php?do=".$DB->table)
?>