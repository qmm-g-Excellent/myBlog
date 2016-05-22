<?php 

class db_sql_functions
{
    private $dbconn;

    //构造函数
    function __construct()
    {
        $this->dbconn = new db();
        return $this;
    }
    /**
     * 判断用户登录
     * 参数：username,password
     * 返回值：(bool) 成功：true, 失败：false
     */
    public function check_user_login($username,$password)       
    {
        $sql = "SELECT name FROM users WHERE name=? AND pw=?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('ss',$username,$password);
        $result = $stmt->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 获取用户信息
     * 参数：uid
     * 返回值：(array) eid,content,uid,title,type,cdate,reader,vote
     */
    public function get_userinfo($uid){               
        $sql = "SELECT uid, name, mail, resume, icon, telephone, website FROM users WHERE uid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('s',$uid);
        $stmt->execute();
        $stmt->bind_result($uid, $name, $mail, $resume, $icon, $telephone, $website);
        $result = $stmt->fetch();
        if($result>0){
            $result = array(
                'uid'=>$uid,
                'name'=>$name,
                'mail'=>$mail,
                'resume'=>$resume,
                'icon'=>$icon,
                'telephone'=>$telephone,
                'website'=>$website);
            return $result;
        }else{
            return false;
        }
    }
    /*
    *修改用户信息之修改密码
    *参数：uid,password
    *返回值：(bool) 成功：true, 失败：false
    */
    public function setting_userinfo_pw($uid,$password){           
        $sql = "UPDATE users SET pw = ? WHERE uid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('si',$password,$uid);
        $result = $stmt->execute();
        if ($result) {
            return true;
        }
        return false;
    }
    /*
    *修改用户信息之修改头像、个人简介、个人网站
    *参数：uid,icon,resume,website
    *返回值：(bool) 成功：true, 失败：false
    */
    public function setting_userinfo_icon($uid,$icon,$resume,$website){           
        $sql = "UPDATE users SET icon = ? , resume = ? , website = ? WHERE uid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('sssi',$icon,$resume,$website,$uid);
        $result = $stmt->execute();
        if ($result) {
            return true;
        }
        return false;
    }
    /*
    *修改用户信息之修改邮箱、联系方式
    *参数：uid,mail,telephone
    *返回值：(bool) 成功：true, 失败：false
    */
    public function setting_userinfo_mail($uid,$mail,$telephone){           
        $sql = "UPDATE users SET mail = ? , telephone = ? WHERE uid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('ssi',$mail,$telephone,$uid);
        $result = $stmt->execute();
        if ($result) {
            return true;
        }
        return false;
    }
    /*
    * 获取文章列表
    * 参数：start_id,limit_num
    * 返回值：列表
    */
    function get_essays_list($start_id = 0, $limit_num = 10)       //????
    {
        $sql = "SELECT eid, title, type FROM essays LIMIT ?, ?";
        // $result = $this->dbconn->query($sql);
        // $rows = array();
        // while ($row = $result->fetch_assoc()) {
        //     array_push($rows, $row);
        // }
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('ii',$start_id,$limit_num);
        $stmt->execute();
        $stmt->bind_result();
        $result = $stmt->fetch();
        if ($result)
            return $result;
        else
            return false;
    }
    /*
    * 获取文章信息
    * 参数：eid
    * 返回值：(array) eid,content,uid,title,type,cdate,reader,vote
    */
    public function get_essay_info($eid)             
    {
        $sql = "SELECT eid,content,uid,title,type,edate,reader,vote FROM essays WHERE eid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('i',$eid);
        $stmt->execute();
        $stmt->bind_result($eid,$content,$uid,$title,$type,$edate,$reader,$vote);
        $result = $stmt->fetch();
        if ($result){
            $result = array(
                'eid'=>$eid,
                'content'=>$content,
                'uid'=>$uid,
                'title'=>$title,
                'type'=>$type,
                'edate'=>$edate,
                'reader'=>$reader,
                'vote'=>$vote);
            return $result;
        }else{
            return false;
        }
    }
    /*
    * 获取文章正文
    * 参数：eid
    * 返回值：文章的：content
    */
    public function get_essay_content($eid)      
    {
        $sql = "SELECT content FROM essays WHERE eid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("i",$eid);
        $stmt->execute();
        $stmt->bind_result($content);
        $result = $stmt->fetch();
        if ($result)
            return $content;
        else
            return false;
    }
    /*
    * 添加文章
    * 参数：uid, title, content, type
    * 返回值：(bool) 成功：true, 失败：false
    */
    public function add_essay($uid, $title, $content, $type)       
    {
        $time = date('Y-m-d');
        $sql = "INSERT INTO essays(uid, title, content, type, edate) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("issss",$uid,$title,$content,$type,$time);
        $result = $stmt->execute();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }
    /*
    * 删除文章
    * 参数：eid
    * 返回值：(bool) 成功：true, 失败：false
    */
    public function delete_essay($eid)              
    {
        $sql = "DELETE FROM essays WHERE eid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("i",$eid);
        $result = $stmt->execute();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }
    /*
    * 模糊查找文章
    * 参数：keyword
    * 返回值：title_lists
    */
    public function search_essays_titles($keyword)                 //????           
    {
        $sql = "SELECT title FROM essays WHERE binary ucase(title) LIKE concat('%',ucase( ? ),'%')";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("s",$keyword);
        $stmt->execute();
        $stmt->bind_result($content);
        $result = $stmt->fetch();
        $rows = array();
        while ($row = $re->fetch_assoc()) {
            array_push($rows, $row);
        }
        if ($rows)
            return $rows;
        else
            return false;
    }
    /*
    * 文章评论(添加评论)
    * 参数：eid, uid, cname, message
    * 返回值：(bool) 成功：true 失败：false
    */
    public function add_comments($eid, $uid, $cname, $message)         
    {
        $time = date('Y-m-d');
        $sql = "INSERT INTO comments (eid,uid,cname,message,cdate) VALUES (? , ?, ?, ?, ?)";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("issss",$eid,$uid,$cname,$message,$time);
        $result = $stmt->execute();
        if ($result)
            return true;
        else
            return false;
    }
    /*
    * 获取文章评论内容列表
    * 参数：eid
    * 返回值：(answer_lists) content, uid, (array) vote, time
    */
    public function get_comment_lists($eid)                                //已实现
    {
        $sql = "SELECT cname, message, cdate, reply FROM comments WHERE eid='$eid'";
        $re = $this->dbconn->query($sql);
        $rows = array();
        while ($row = $re->fetch_assoc()) {
            array_push($rows, $row);
        }
        if ($rows)
            return $rows;
        else
            return false;
    }
     /*
    * 获取文章评论的数目
    * 参数：eid
    * 返回值：(number) cnum 
    */
    public function get_commentnum($eid)                      
    {
        $sql = "SELECT COUNT(eid) FROM comments WHERE eid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("i",$eid);
        $stmt->execute();
        $stmt->bind_result($cnum);
        $result = $stmt->fetch();
        if ($result) {
            return $cnum;
        }
        return false;
    }
    /*
    * 添加回复
    * 参数：uid, eid, reply
    * 返回值：(bool) 成功：true, 失败：false
    */
    public function add_answer($uid, $eid, $reply)            
    {
        $time = date('Y-m-d');
        $up_string = "-" . $time . "-";
        $up_reply = $up_string . $reply;
        $sql = "INSERT INTO comments(uid, eid, reply, cdate) VALUES(? , ?, ?, ?)";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("iiss",$uid,$eid,$up_reply,$time);
        $result = $stmt->execute();
        if ($result) {
            return true;
        }
        return false;
    }
    /*
    * 追加回复(针对某一条评论的回复)
    * 参数：cid, add_reply
    * 返回值：(bool) 成功：true, 失败：false
    */
    public function append_answer_comment($cid, $add_reply)         
    {
        $up_time = date('Y-m-d');
        $up_string = "-" . $up_time . "-";
        $sql = "SELECT reply FROM comments WHERE cid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("i",$cid);
        $stmt->execute();
        $stmt->bind_result($e_reply);
        $result = $stmt->fetch();
        if ($e_reply) {                              //第一次添加时，值为空,但追加回复时，值不为空
            $reply = $e_reply . $up_string . $add_reply;
            $sql = "UPDATE comments SET reply= ? WHERE cid= ?";
            $stmt = $this->dbconn->get_mysqli()->stmt_init();         
            $stmt->prepare($sql);
            $stmt->bind_param("si",$reply,$cid);
            $result = $stmt->execute();
            if ($result) {
                return true;
            }
            else{
                return false;
            }
        } else {
            return false;
        }
    }
    /*
    * 删除回复
    * 参数：cid
    * 返回值：(bool) 成功：true, 失败：false
    */
    public function delete_answer($cid)                        
    {
        $sql = "DELETE FROM comments WHERE cid= ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("i",$cid);
        $result = $stmt->execute();
        if ($result) {
            return true;
        }
        return false;
    }
    /*
    * 添加文章“赞”
    * 参数：eid
    * 返回值：(bool) 成功：true, 失败：false
    */
    public function add_essay_vote($eid)                             
    {
        $sql = "UPDATE essays SET vote = vote+1 WHERE eid= ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("i",$eid);
        $result = $stmt->execute();
        if ($result) {
            return true;
        }
        return false;
    }
    /*
    * 获取文章“赞”的数目
    * 参数：eid
    * 返回值：(unmber) vote 
    */
    public function get_votenum($eid)                         
    {
        $sql = "SELECT vote FROM essays WHERE eid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("i",$eid);
        $stmt->execute();
        $stmt->bind_result($vote);
        $result = $stmt->fetch();
        if ($result) {
            return $vote;
        }
        return false;
    }
    /*
    * 添加文章阅读量
    * 参数：eid
    * 返回值：(bool) 成功：true, 失败：false
    */
    public function add_essay_read($eid)                       
    {
        $sql = "UPDATE essays SET reader = reader+1 WHERE eid= ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("i",$eid);
        $result = $stmt->execute();
        if ($result) {
            return true;
        }
        return false;
    }
    /*
    * 获取文章阅读量的数目
    * 参数：eid
    * 返回值：(unmber) reader
    */
    public function get_readnum($eid)                         
    {
        $sql = "SELECT reader FROM essays WHERE eid = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();         
        $stmt->prepare($sql);
        $stmt->bind_param("i",$eid);
        $stmt->execute();
        $stmt->bind_result($reader);
        $result = $stmt->fetch();
        if ($result) {
            return $reader;
        }
        return false;
    }
}
    

 ?>