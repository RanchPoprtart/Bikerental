<?php

/* echo `[ {
                "bikeId": "1",
				"description": "Kids Bike",
				"imagename: "kidsbike.jpg",
				"size": "20",
				"color": "pink",
				"status": "available"
			},   {

                "bikeId": "2",
				"description": "Beach Cruiser ",
				"imagename": "kidsbike.jpg",
				"size": "20",
				"color": "pink",
				"status": "available"

			},     {

                "bikeId": "3",
				"description": "Eletric Bike ",
				"imagename": "eletricbike.jpg",
				"size": "18",
				"color": "black",
				"status": "available"

			},
					{

                "bikeId": "4",
				"description": "Mountain Bike ",
				"imagename": "mountainbike.jpg",
				"size": "20",
				"color": "red",
				"status": "available"

			},

					{

                "bikeId": "5",
				"description": "Street Bike ",
				"imagename": "streetbike.jpg",
				"size": "16",
				"color": "grey",
				"status": "available"

			},

					{

                "bikeId": "6",
				"description": "Ladies Bike ",
				"imagename": "ladiesbike.jpg",
				"size": "21",
				"color": "blue",
				"status": "available"

			},]`; ";
*/



$conn = new mysqli("localhost", "root", "", "bikes");

if ($conn->connect_error) {
	die("DB connection error: " . $conn->connect_error);
}


$jsonString = "[";

$sql = " SELECT * FROM bike";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$jsonString .= '{"bikeId": ' . $row["bikeId"] . ",";
		$jsonString .= '"description": "' . $row["description"] . '",' ;
		$jsonString .= '"imagename": "' . $row["imagename"] . '",';
		$jsonString .= '"size": ' . $row["size"] . ',';
		$jsonString .= '"color": "' . $row["color"] . '",';
		$jsonString .= '"status": "' . $row["status"] . '"},';
	}
} else {
	die("Error: no records in bike database");
}


$jsonString = trim($jsonString, ",");
$jsonString = $jsonString . "]";

echo $jsonString;
?>














































