<?php

include_once "../base.php";


$table = $_GET['table'];
$db = new DB($table);
$chk = $db->find(['acc'=>$_GET['acc'],'pw'=>$_GET['pw']]);

if(!empty($chk)){
  echo 1;
  $_SESSION[$table] = $_GET['acc'];
}else{
  echo 0;
}



?>