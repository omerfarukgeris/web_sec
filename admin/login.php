<?php


include("../config/db.php");
if(isset($_GET['new_name'])){
	$sql="update admins  set name='".$_GET['new_name']."' where name='".$_COOKIE['username']."'";
	$result=$con->query($sql);
	echo $sql;
	if($result->num_rows<0){
		echo "hata";
		
	}
	setcookie("username",$_GET['new_name'],time() + (86400 * 30),"/");
	$con->close();
die;
}
if(isset($_COOKIE['username'])){
print('<script>setTimeout("location.href = \'index.php\';", 1500);</script>');
		die();
}
if(isset($_POST['name']) && isset($_POST['pass'])){

	$name = $_POST['name'];
	$pass = $_POST['pass'];
	
	$sql="select * from admins where name='$name' and pass='$pass'";
	$result = $con->query($sql);
	
	if($result->num_rows>0){

		$row=$result->fetch_assoc();
		
		echo "Giriş Başarılı";
		setcookie("username",$row['name'],time() + (86400 * 30),"/");
		setcookie("is_admin",$row['yetki'],time() + (86400 * 30),"/");
		print('<script>setTimeout("location.href = \'index.php\';", 1500);</script>');
		
	}else
		echo "Kullanıcı adı veya parola hatalı".$con->error;

$con->close();

	die;		
}	


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script>
function login(){
	var name=$("#name").val();
	var pass=$("#pass").val();

	var xhttp = new XMLHttpRequest;
	xhttp.onreadystatechange = function () {
	if(this.status==200 && this.readyState == 4){
	
		$("#info").html(this.responseText);	
		
}
	};
	
	xhttp.open("POST","login.php", false);
	xhttp.setRequestHeader("Content-type",  "application/x-www-form-urlencoded");
	
	xhttp.send("name="+name+"&pass="+pass);
}

</script>


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form >
      <div class="form-group has-feedback">
        <input type="email" id="name" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="pass" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" onclick="login();" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p id="info">- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="#" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
