<?php 

//入口文件
require_once "init.php";

$db = new db_sql_functions();
$title_lists = $db->get_essays_list();
$results = array();
// var_dump($title_lists); 
for ($i=0; $i < count($title_lists); $i++) { 
	$result = $db->get_essay_info($title_lists[$i]['eid']);
	array_push($results,$result);
}
// var_dump($results);
$smarty->assign('essays',$results);
$smarty->display('index.tpl');
?>