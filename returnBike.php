<?php
if (!(isset($_GET["Id"]))) {
	die("Error: invalid parameters");

}

$conn = new mysqli("localhost", "root", "", "bikes");

$sql = "UPDATE  bikes SET status='Rented' Where id=" . $_GET["Id"];
if ($conn->query($sql) === true) {
	echo "Success";
} else {
	die("Error:" . $conn->error);
}