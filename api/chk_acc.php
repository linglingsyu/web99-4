<?php

include_once "../base.php";

$chk = $Member->find(['acc'=>$_GET['acc']]);

if(!empty($chk)){
  echo 1;
}else{
  echo 0;
}



?>