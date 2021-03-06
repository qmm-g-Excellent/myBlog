<?php 

require_once "./config/db.config.php";

class db {
    //数据库连接信息
    private $db;
    private $res;

    //构造函数
    function __construct()
    {
        $this->db = new mysqli(FAQ_DB_HOST, FAQ_DB_USER, FAQ_DB_PASSWORD, FAQ_DB_NAME, FAQ_DB_PORT);
        if (mysqli_connect_errno())
        {
            echo "数据库连接失败".mysqli_connect_errno().mysqli_connect_error();
            exit();
        }
        $this->db->set_charset('utf8');
        return $this->db;
    }

    //
    public function get_mysqli()
    {
        return $this->db;
    }
    
    //执行sql语句
    public function query($sql)
    {
        $this->res = $this->db->query($sql);
        return $this->res;
    }

    //字符过滤
    public function escape_string($buf)
    {
        return $this->db->escape_string($buf);
    }

    //析构函数，关闭数据库连接，自动调用
    function __destruct()
    {
        if( is_object($this->res) )
            $this->res->free();
        $this->db->close();
    }
}

 ?>