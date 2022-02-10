<?php
date_default_timezone_set("Asia/Taipei");
session_start();
// 物件導向 像車子 零件就是變數 功能就是方法
// class是php一種固定導向的名稱 想要建立物件導向的時候
class DB{
    protected $dsn="mysql:host=localhost;
    charset=utf8;dbname=web001";
    protected $user="root";
    protected $pw='';
    protected $pdo;
    // 宣告公開變數
    public $table;
    public $title;
    public $button;
    public $header;
    public $append;
    public $upload;


    // 去建構
    public function __construct($table){

        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
        $this->setStr($table);
    }
    public function test($id){
        $sql="SELECT * FROM $this->table WHERE ";

        if(is_array($id)){
            // $key都是字串 然後js的index 都是 數字
            foreach($id as $key => $value){
                $tmp[]="`$key`='$value'";
            }
// implode Join array elements with a string 是陣列拆成字串 explode是字串組成陣列
// sql .就是字串纍加 數字纍加則是加號
            $sql .= implode(" AND ",$tmp);
        }else{
            $sql .= " `id`='$id'";
        }
echo $sql;
    }


    private function setStr($table){
        switch($table){
            case "title";
                $this->title="網站標題管理";
                $this->button="新增網站標題圖片";
                $this->header="網站標題";
                $this->append="替代文字";
                $this->upload="網站標題圖片";
                break;
            case "ad";
            $this->title="動態文字廣告管理";
            $this->button="新增動態文字廣告";
            $this->header="動態文字廣告";
            break;

            case "mvim";
            $this->title="動畫圖片管理";
            $this->button="新增動畫圖片";
            $this->header="動畫圖片";
            $this->upload="動畫圖片";
            break;
            case "image";
            $this->title="校園映像資料管理";
            $this->button="新增校園映像圖片";
            $this->header="校園映像資料圖片";
            $this->upload="校園映像圖片";
            break;
            case "total";
            $this->title="進站總人數管理";
            $this->button="";
            $this->header="進站總人數:";
            break;
            case "bottom";
            $this->title="頁尾版權資料管理";
            $this->button="";
            $this->header="頁尾版權資料";
            break;
            case "news";
            $this->title="最新消息資料管理";
            $this->button="新增最新消息資料";
            $this->header="最新消息資料內容";
            break;
            case "admin";
            $this->title="管理者帳號管理";
            $this->button="新增管理者帳號";
            $this->header="帳號";
            $this->append="密碼";
            break;
            case "menu";
            $this->title="選單管理";
            $this->button="新增主選單";
            $this->header="主選單名稱";
            $this->append="選單連結網址";
            break;
        }
    }
// 比方 $Total->find('$id') 就是 $Total用find方法 去total資料表把$id撈出來
    public function find($id){
        $sql="SELECT * FROM $this->table WHERE ";
        if(is_array($id)){
            // $key都是字串 然後js的index 都是 數字
            foreach($id as $key => $value){
                $tmp[]="`$key`='$value'";
            }
// implode Join array elements with a string 是陣列拆成字串 explode是字串組成陣列
// sql .就是字串纍加 數字纍加則是加號
            $sql .= implode(" AND ",$tmp);
        }else{
            $sql .= " `id`='$id'";
        }

        // pdo 為pdo資料庫裏的一個方法 主要crud就靠這個->再用pdo裏的query方法把sql結果 最終用fetch帶出來
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    // zhi huan tao ti zhi
    public function all(...$arg){
        $sql="SELECT * FROM $this->table ";

        switch(count($arg)){
            case 2:
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }

                $sql .=" WHERE ".implode(" AND ",$arg[0])." ".$arg[1];

            break;
        // zhi zhen tao ti zhi zhi
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .= " WHERE ".implode(" AND ",$arg[0]);
                }else{
                    // $sql .= $arg[1];
                    $sql .= $arg[0];

                }
            break;
        }
        echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function math($method,$col,...$arg){
        $sql="SELECT $method($col) FROM $this->table ";

        switch(count($arg)){
            case 2:
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                // 從arg[0]改成了tmp
                $sql .=" WHERE ".implode(" AND ",$tmp)." ".$arg[1];
                // $sql .=" WHERE ".implode(" AND ".$arg[0])." ".$arg[1];

            break;
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .= " WHERE ".implode(" AND ",$tmp);
                }else{
                    $sql .= $arg[0];

                }
            break;
        }


        return $this->pdo->query($sql)->fetchColumn();
    }
    // 陣tao ti zi set where 指
    public function save($array){
        if(isset($array['id'])){
            //update
            foreach($array as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql="UPDATE $this->table
                     SET ".implode(",",$tmp)."
                   WHERE `id`='{$array['id']}'";
        }else{
            //insert

            $sql="INSERT INTO $this->table (`".implode("`,`",array_keys($array))."`)
                                     VALUES('".implode("','",$array)."')";
        }

       // echo $sql;
        return $this->pdo->exec($sql);
    }

    public function del($id){
        $sql="DELETE FROM $this->table WHERE ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]="`$key`='$value'";
            }

            $sql .= implode(" AND ",$tmp);
        }else{
            $sql .= " `id`='$id'";
        }

        return $this->pdo->exec($sql);
    }
    public function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:".$url);
}
// 直接引用total資料表 到 $Total ,new DB是固定用法 就是要引用這個DB類別的時候 賦予到新變數
$Total=new DB('total');
$Bottom=new DB('bottom');
$Title=new DB('title');
$Ad=new DB('ad');
$Mvim=new DB('mvim');
$Image=new DB('image');
$News=new DB('news');
$Admin=new DB('admin');
$Menu=new DB('menu');


//$tt=(isset($_GET['do']))?$_GET['do']:'';
//$tt=isset($_GET['do'])??'';
$tt=$_GET['do']??'';

switch($tt){
    case "ad":
        $DB=$Ad;
    break;
    case "mvim":
        $DB=$Mvim;
    break;
    case "image":
        $DB=$Image;
    break;
    case "total":
        $DB=$Total;
    break;
    case "bottom":
        $DB=$Bottom;
    break;
    case "news":
        $DB=$News;
    break;
    case "admin":
        $DB=$Admin;
    break;
    case "menu":
        $DB=$Menu;
    break;
    default:
        $DB=$Title;
    break;
}
/* $total=$Total->find(1);

//echo $Total->find(1)['total'];
echo $total['total'];

print_r($Total->all()); */

if(!isset($_SESSION['total'])){
    $total=$Total->find(1);
    $total['total']++;
    $Total->save($total);
    $_SESSION['total']=$total['total'];
}


?>