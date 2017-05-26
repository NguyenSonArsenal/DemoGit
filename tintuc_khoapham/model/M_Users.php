<?php 

namespace model;


class M_Users extends Database 
{

	function dangKi($name, $email, $password)
	{
		$conn = self::connect();

		$password = md5($password);

		$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

		$result = $conn->query($sql);

		if ($result == true) {
			$last_id = $conn->insert_id;
			return $last_id;
			//echo "New record created successfully. Last inserted ID is: " . $last_id;
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
			return false;
		}


	}

}


?>