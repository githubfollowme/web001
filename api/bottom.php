<!-- 完成頁尾版權資料管理功能 -->
<?php include_once "../base.php";

/* 
$views=$_POST['total'];
$total=$Total->find(1);
$total['total']=$views; */
$Bottom->save(['id'=>1,'bottom'=>$_POST['bottom']]);

to("../back.php?do=bottom");