<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			
			$user_id=null;
			$sql1= "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["id"];
				break;
			}

			//Se verifica si el hash coincide
			$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
			$correcto = password_verify($_POST["password"], $hash);

			if($user_id==null || !$correcto){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../home.php';</script>";				
			}
		}
	}
}
?>