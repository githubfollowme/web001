public function __construct($table){

$this->table=$table;
$this->pdo=new PDO($this->dsn,$this->user,$this->pw);
$this->setStr($table);
}