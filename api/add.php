
<!-- 簡化變數及api的傳遞 -->
<?php
include  "../base.php";
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}else{
    $data['img']='';
}

$data['text']=$_POST['text'];
$data['sh']=0;
$DB->save($data);
to("../back.php?do=".$DB->table)
?>