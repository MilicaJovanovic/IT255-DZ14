<?php
	include("config.php");

	$roomNumber = $_POST['number'];
	$beds = $_POST['beds'];
	$size = $_POST['size'];
	$description = $_POST['description'];

	function addRoom($roomNumber, $beds, $size, $desription) {
		global $conn;
		if (checkIfRoomExists($roomNumber)) {
			echo "Nije moguće dodati sobu, ista već postoji!";
		} else {
			$insert = "INSERT INTO room (number, beds, size, description) VALUES (?,?,?,?)";
			$query = $conn->prepare($insert);
			$query->bind_param('ssss',$roomNumber,$beds,$size,$description);
			$query->execute();
			$query->close();
			echo "Uspešno ste se dodali sobu!";
		}
	}

	function checkIfRoomExists($roomNumber) {
		global $conn;
		$check = "SELECT * FROM room WHERE number = ?";
		$query = $conn->prepare($check);
		$query->bind_param('s',$roomNumber);
		$query->execute();
		$query->store_result();
		if ($query->num_rows == 0) {
			return false;
		}
		$query->close();
		return true;
	}

	addRoom($roomNumber, $beds, $size, $description);
?>