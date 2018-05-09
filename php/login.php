<?php
if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			
			//Evitar inyección SQL
			$username = mysqli_real_escape_string($con, trim($_POST['username']));
			$password = mysqli_real_escape_string($con, trim($_POST['password']));

			$user_id=null;
            $sql1= "select * from user where (username=\"$username\" or email=\"$username\")";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["id"];
				$user_fullname=$r["fullname"];
				$user_username=$r["username"];
				$user_email=$r["email"];
				$user_password=$r["password"];
				$user_rol=$r["rol"];
				$user_phonenumber=$r["phonenumber"];
				$user_created_at=$r["created_at"];
				break;
			}
			
			$rs = mysqli_query($con,$sql1);
			$numRows = mysqli_num_rows($rs);
            
			if($numRows  == 1){
				$row = mysqli_fetch_assoc($rs);
				if(password_verify($_POST["password"],$user_password)){
					session_start();
					$_SESSION["user_id"]=$user_id;
					$_SESSION["user_fullname"]=$user_fullname;
					$_SESSION["user_username"]=$user_username;
					$_SESSION["user_email"]=$user_email;
					$_SESSION["user_password"]=$user_password;
					$_SESSION["user_rol"]=$user_rol;
					$_SESSION["user_phonenumber"]=$user_phonenumber;
					$_SESSION["user_created_at"]=$user_created_at;
					
					print "<script>window.location='../home.php';</script>";
				}
				else{
					print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
				}
			}
			else{
				print "<script>alert(\"Usuario no encontrado.\");window.location='../login.php';</script>";
			}

		}
	}
}

?>