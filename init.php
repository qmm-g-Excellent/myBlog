<?php 

require_once "libs/db.class.php";
require_once "libs/user.class.php";
require_once "libs/dbsql.function.php";

require('Smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->left_delimiter = "{";//左定界符
$smarty->right_delimiter = "}";
$smarty->template_dir = "tpl";//html模板的地址

 ?>