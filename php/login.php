<?php
if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			
			$user_id=null;
            $sql1= "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") 
            and password=\"$_POST[password]\" ";
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
            
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{
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
		}
	}
}

?>