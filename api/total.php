<!-- 完成後台進站總人數管理功能 -->
<?php include_once "../base.php";

// $views=$_POST['total'];

// $total=$Total->find(1);
// $total['total']=$views;
// 用save函數 去找 找到有id的(boolean為1) 然後 total 進站人數 就 post取值
$Total->save(['id'=>1,'total'=>$_POST['total']]);
to("../back.php?do=total");
?>