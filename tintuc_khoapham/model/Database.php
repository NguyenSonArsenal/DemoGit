<?php 

namespace model;
use mysqli;


class Database
{
	static function connect()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tintuc_khoapham";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		//echo "Connected successfully";
		return $conn;
	}

	static function getDBToJson($table)
	{
		$conn = self::connect();

		$sql = "SELECT * FROM " . $table;
		
		$result = $conn->query($sql);

		$arrayConverDbToJson = mysqli_fetch_all($result,MYSQLI_ASSOC);

		return $arrayConverDbToJson;

	}

}

