<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["fullname"]) &&isset($_POST["email"]) &&isset($_POST["password"]) &&isset($_POST["confirm_password"])){
		if($_POST["username"]!=""&& $_POST["fullname"]!=""&&$_POST["email"]!=""&&$_POST["password"]!=""&&$_POST["password"]==$_POST["confirm_password"]){
			include "conexion.php";
			
			$found=false;
			$sql1= "select * from user where username=\"$_POST[username]\" or email=\"$_POST[email]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}

			//Encriptar
			$pass_encrypt = password_hash($_POST["password"], PASSWORD_DEFAULT);

			//Protección Inyección SQL
			$username = mysqli_real_escape_string($con, trim($_POST['username']));
			$fullname = mysqli_real_escape_string($con, trim($_POST['fullname']));
			$email = mysqli_real_escape_string($con, trim($_POST['email']));

			if($found){
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../registro.php';</script>";
			}
			$sql = "insert into user(username,fullname,email,password,created_at) value 
			(\"$username\",\"$fullname\",\"$email\",\"$pass_encrypt\",NOW())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../index.php';</script>";
				
			}
		}
	}
}

?>