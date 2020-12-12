<?php
session_start();
$connect = mysqli_connect("127.0.0.1", "root", "", "lesson40");
		
		$text_querys_insert = "SELECT * FROM users";
		$querys = mysqli_query($connect, $text_querys_insert);

		for ($i=0; $i < $querys->num_rows; $i++) {
			$stroka = $querys -> fetch_assoc(); 

			if ($_POST["email"] == $stroka["email"]) {
			$text_query_insert = "SELECT * FROM users WHERE email = '".$_POST["email"]."' AND password = '".$_POST["password"]."'";
				break;
			
			}

			if ($_POST["email"] == $stroka["phone"]) {
			$text_query_insert = "SELECT * FROM users WHERE phone = '".$_POST["email"]."' AND password = '".$_POST["password"]."'";
				break;
			}

		}
		$query = mysqli_query($connect, $text_query_insert);
		$stroka = $query -> fetch_assoc(); 
		if ($query->num_rows > 0) {
			$_SESSION["id"] = $stroka["id"];
			header("location: account.php");
		}
		else {
			header("location: index.php?error=нет такого пользователя");
				
		} 
 ?>