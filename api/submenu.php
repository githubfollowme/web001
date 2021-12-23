<?php
echo "123";


// 用dd 看剛才的資料是否有送過來
dd($_POST);
dd($_GET);

// 你的parent就是 $_GET['main']裡面的值
foreach($_POST['name'] as $key=>$name){
    if($name!=''){
        $Menu->save(['name'=>$name,
                        'href'=>$_POST['href'][$key],
                        'sh'=>1,
                        'parent'=>$_GET

        ])
    }
}

to("")

?>