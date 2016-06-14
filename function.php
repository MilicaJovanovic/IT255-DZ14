<?php
	include("config.php");

	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	function addUser($name, $surname, $email, $username, $password) {
		global $conn;
		if (checkIfUserExists($username)) {
			echo "Nije moguće registrovanje, korisnik sa istim korisničkim namenom već postoji!";
		} else {
			$insert = "INSERT INTO user (name, surname, email, username, password) VALUES (?,?,?,?,?)";
			$query = $conn->prepare($insert);
			$query->bind_param('sssss',$name,$surname,$email,$username,$password);
			$query->execute();
			$query->close();
			echo "Uspešno ste se registrovali!";
		}
	}

	function checkIfUserExists($username) {
		global $conn;
		$check = "SELECT * FROM user WHERE username = ?";
		$query = $conn->prepare($check);
		$query->bind_param('s',$username);
		$query->execute();
		$query->store_result();
		if ($query->num_rows == 0) {
			return false;
		}
		$query->close();
		return true;
	}

	addUser($name, $surname, $email, $username, $password);
?>