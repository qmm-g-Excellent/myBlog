<?php 

class user
{
    private $ret;//状态
    private $uid;
    private $name;
    private $db;
    function __construct(){
        if(isset($_SESSION['uid'])){        //需要前端传送用户登录信息?????
            $this->userid = $_SESSION['uid'];
            $this->name = $_SESSION['name'];
            $this->ret = 0;
        }
        else {
            $this->userid = 0;
            $this->ret = -1;
        }
        $this->db = new db_sql_functions();
    }
    //跳转内部平台验证用户登陆信息，验证成功返回ture 否则返回false
    public function user_login_linux(){
        return false;
    }
    //退出当前用户，成功返回ture 否则返回false
    public function user_login_out(){
        //清除session
        //清除cookie
        session_unset();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-3600);
        }
        session_destroy();
        return true;
    }
    //获取当前登陆用户信息
    public function user_get_login(){
        //返回用户数据
        $tmp = array("ret"=>$this->ret,"uid"=>$this->uid,"name"=>$this->name);
        // $tmp = json_encode($tmp);
        return $tmp;
    }
    //获取个人资料信息(完整的资料)
    public function user_getinfo($uid){
        //通过数据库查询用户数据get_userinfo()
        $result = $this->db->get_userinfo($uid);
        if ($result){
            $tmp = array("ret"=>"0");
            $t = array_combine($tmp,$result);
            return json_encode($t);      //将数组转化为json格式，即字符串
            // return $t;
        }else{
            $tmp = array("ret"=>"-1");
            return json_encode($tmp);
            // return $tmp;
        }
    }
    //获取用户权限，返回数据表中标识权限的字段所对应的值
    public function user_get_privilege($user_id){
        $result = $this->db->get_userinfo($user_id);
        if ($result){
            return $result['privilege'];
        }
        return false;
    }
}

 ?>