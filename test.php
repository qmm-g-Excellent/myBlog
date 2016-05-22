<?php 

//模块测试
require_once "init.php";

$db = new db_sql_functions();

// //测试登录                       
// $oname = $_REQUEST["username"];
// $opw = $_REQUEST["pw"];
// $is_true = $db->check_user_login('qmm','qmmblog');
// var_dump($is_true);

//测试用户信息的获取
// $message = $db->get_userinfo(1);
// var_dump($message);

//测试用户密码的修改
// $is_true = $db->setting_userinfo_pw(1,'123456');
// var_dump($is_true);


//测试用户头像、个人简介、个人网站的修改                     
// $is_true = $db->setting_userinfo_icon(1,'icon_2','谁的青春不迷茫','http://baidu.com');
// var_dump($is_true);

//测试用户邮箱、联系方式的修改                            
// $is_true = $db->setting_userinfo_mail(1,'123456789@qq.com','18829289756');
// var_dump($is_true);

//测试获取文章列表
// $result = $db->get_essays_list();
// var_dump($result);

//测试文章所有信息的获取
// $essay = $db->get_essay_info(3);
// var_dump($essay);

//测试文章正文的获取                        
// $content = $db->get_essay_content(3);
// var_dump($content);

//测试添加文章
// $is_true = $db->add_essay(2,'javacript','内容3','web大全');
// var_dump($is_true);

//测试删除文章
// $is_true = $db->delete_essay(7);
// var_dump($is_true);

//测试查询文章
// $essay = $db->search_essays_titles('web');
// if ($essay) {
// 	echo $essay[0]['title'];
// }
// else{
// 	echo "没有此文章";
// }

//测试添加评论
// $is_true = $db->add_comments(8,2,'qmm','very bad');
// var_dump($is_true);

//测试获取文章的评论列表    (一篇文章的所有评论)
// $comments = $db->get_comment_lists(4);
// if ($comments) {
// 	echo $comments[2]['message'];
// }
// else{
// 	echo "文章没人评论";
// }

//测试文章评论的数目
// $num = $db->get_commentnum(8);
// var_dump($num);

//测试添加回复
// $is_true = $db->add_answer(2,8,'it is very good');
// var_dump($is_true);

//测试追加回复
// $is_true = $db->append_answer_comment(15,'it is very bad');
// var_dump($is_true);

//测试删除回复
// $re = $db->delete_answer(11);
// var_dump($re);

//测试点赞文章
// $re = $db->add_essay_vote(3);
// var_dump($re);

//测试获取文章赞的数目
// $re = $db->get_votenum(3);
// var_dump($re);

//测试增加文章阅读量
// $re = $db->add_essay_read(4);
// var_dump($re);

//测试获取文章阅读量
// $re = $db->get_readnum(4);
// var_dump($re);


 ?>