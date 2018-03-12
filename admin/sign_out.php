<?php


setcookie("username","",time()-3000,"/");
setcookie("is_admin","",time()-3000,"/");
header("location:../index.php");
?>
