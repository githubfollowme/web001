<?php
include "./Management_page_files";
$db=new Database($_POST['table']);
unset($_POST['table']);

foreach($_POST['id']as $index=>$id){

}

// <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
// <!-- saved from url=(0048)?do=admin -->
// <html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

// <title>卓越科技大學校園資訊系統</title>
// <link href="./Administrator_Login_files/css.css" rel="stylesheet" type="text/css">
// <script src="./Administrator_Login_files/jquery-1.9.1.min.js"></script>
// <script src="./Administrator_Login_files/js.js"></script>
// </head>

// <body>
// <div id="cover" style="display:none; ">
// 	<div id="coverr">
//     	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
//         <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
//     </div>
// </div>
// <iframe style="display:none;" name="back" id="back"></iframe>
// 	<div id="main">
//     	<a title="" href="?"><div class="ti" style="background:url(&#39;use/&#39;); background-size:cover;"></div><!--標題--></a>
//         	<div id="ms">
//              	<div id="lf" style="float:left;">
//             		<div id="menuput" class="dbor">
//                     <!--主選單放此-->
//                     	                            <span class="t botli">主選單區</span>
//                                                 </div>
//                     <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
//                     	<span class="t">進站總人數 : 
//                         	1                        </span>
//                     </div>
//         		</div>