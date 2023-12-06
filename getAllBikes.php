<?php

/* echo `[ {
				"description": "Kids Bike",
				"imagename: "kidsbike.jpg",
				"size": "20",
				"color": "pink",
				"status": "available"
			},   { 

				"description": "Beach Cruiser ",
				"iamgename": :"kidsbike.jpg",
				"size": "20",
				"color": "pink",
				"status": "available"
				
			},     { 

				"description": "Eletric Bike ",
				"iamgename": :"eletricbike.jpg",
				"size": "18",
				"color": "black",
				"status": "available"
				
			},
					{ 

				"description": "Mountain Bike ",
				"iamgename": :"mountainbike.jpg",
				"size": "20",
				"color": "red",
				"status": "available"
				
			},
			
					{ 

				"description": "Street Bike ",
				"iamgename": :"streetbike.jpg",
				"size": "16",
				"color": "grey",
				"status": "available"
				
			},
			
					{ 

				"description": "Ladies Bike ",
				"iamgename": :"ladiesbike.jpg",
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

$sql = " SELECT * FROM bikes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$jsonString .= '{"Id": ' . $row["Id"] . ",";
		$jsonString .= '"description": "' . $row["description"] . '",' ;
		$jsonString .= '"imagename": "' . $row["imagename"] . '",';
		$jsonString .= '"size": ' . $row["size"] . ',';
		$jsonString .= '"color": "' . $row["color"] . '",';
		$jsonString .= '"status": "' . $row["status"] . '"},';
	}
} else {
	die("Error: no records in bike database");
}


$jsonString = rtrim($jsonString, ",");
$jsonString = $jsonString . "]";

echo $jsonString;
?>














































