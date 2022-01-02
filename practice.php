<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=web01";
    protected $user = "root";
    protected $pw = '';
    protected $pdo;
    // tt bua h
    public $table;
    public $title;
    public $button;
    public $header;
    public $append;
    public $upload;
    public function _construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        $this->setStr($table);
    }
    private function setStr($table)
    {
        switch ($table) {
            case "title";
                $this->title = "網站標題管理";
                $this->button = "新增網站標題圖片";
                $this->header = "網站標題";
                $this->append = "替代文字";
                $this->upload = "網站標題圖片";
                break;

            case "ad";
                $this->title = "動態文字廣告管理";
                $this->button = "新增動態文字廣告";
                $this->header = "動態文字廣告";
                break;

            case "mvim";
                $this->title = "動畫圖片管理";
                $this->button = "新增動畫圖片";
                $this->header = "動畫圖片";
                $this->upload = "動畫圖片";

                break;
            case "total";
                $this->title = "進站總人數管理";
                $this->button = "";
                $this->header = "進站總人數";
                break;

            case "bottom";
                $this->title = "頁尾版權資料管理";
                $this->button = "";
                $this->header = "頁尾版權資料";
                break;

            case "news";
                $this->title = "最新消息資料管理";
                $this->button = "";
                $this->header = "最新消息資料內容";
                break;

            case "admin";
                $this->title = "管理者帳號管理";
                $this->button = "新增管理者帳號";
                $this->header = "帳號";
                $this->append = "密碼";
                break;

            case "menu";
                $this->title = "選單管理";
                $this->button = "新增主選單";
                $this->header = "主選單名稱";
                $this->append = "選單連結網址";
                break;
        }
    }
    public function find($id)
    {
        $sql = "SELECT *FROM $this->table WHERE";

        if (is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }
            $sql .= implode("AND", $tmp);
        } else {
            $sql .= "`id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function all(...$arg)
    {
        $sql = "SELECT * FROM $this->table";

        switch (count($arg)) {
            case 2:
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key`='$value'";
                }
                $sql .= "WHERE" . implode("AND", $arg[0]) . "" . $arg[1];

                break;
            case 1:
                if (is_array($arg[0])) {
                    foreach ($arg[0] as $key => $value) {
                        $tmp[] = "`$key`='$value'";
                    }
                    $sql .= "WHERE" . implode("AND", "$arg[0]");
                } else {
                    //sql .=$arg[1];
                    $sql .= $arg[0];
                }
                break;
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function math($method, $col, ...$arg){
    
        $sql = "SELECT $method($col) FROM $this->table";
    
    switch(count($arg)){
        case 2:
            foreach($arg[0]) as $key=>$value){
                $tmp[]="`$key`='$value'";
            }
            $sql .="WHERE".implode("AND",$tmp)." ".$arg[1];
            break;
        case 1:
                if (is_array($arg[0])) {
                    foreach ($arg[0] as $key => $value) {
                        $tmp[] = "`$key`='$value'";
                    }
                    $sql .= "WHERE" . implode("AND", "$tmp");
                } else {
                    //sql .=$arg[1];
                    $sql .= $arg[0];
                }
            break;
    }
    return $this->pdo->query($sql)->fetchColumn();
}

