<?php


include("config/db.php");

if(isset($_POST['name']) && isset($_POST['pass'])){

	$name = $_POST['name'];
	$pass = $_POST['pass'];
	
	$sql="select * from admins where name='$name' and pass='$pass'";
	$result = $con->query($sql);
	
	if($result->num_rows>0){

		$row=$result->fetch_assoc();
		
		echo "Giriş Başarılı";
		setcookie("username",$row['name']);
		
		print('<script>window.location.href="admin/index.php"');
		die();
	}else
		echo "Kullanıcı adı veya parola hatalı".$con->error;
		die();
}


?>



