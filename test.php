<!-- php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
protected $dsn="mysql:host=localhost;charset=utf8;dbname=web01";
protected $user="root";
protected $pw='pw';
protected $table='table';
protected $pdo;

public $table;
public $title;
public $button;
public $header;
public $append;
public $upload;


public function __construct($table){
$this->table=$table;
$this->pdo=new PDO($this->dsn,$this->root,$this->pw);
$this->setStr($table);


}

public function find($id){
    $sql="SELECT*FROM $this->table WHERE";
    if(is_array($id)){
        foreach($id as $key=>$value){
            $tmp[]="`$key`='$value'";
        }
        $sql .=implode(" AND ",$tmp);
    }else{
        $sql .="`id`='$id'";

    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);





} -->