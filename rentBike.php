<?php
if (!(isset($_GET["Id"]) and isset($_GET["renterName"]))) {
	die("Error: invalid parameters");

}

$conn = new mysqli("localhost", "root", "", "bikes");


//$sql = "INSERT INTO history (renterName, daterented, bikesid)";
//$sql .= " VALUES ('" . $_GET["renterName"] . "'," . date("Y/m/d") . ", " . $_GET["Id"] . ")";

$stmt = $conn->prepare("INSERT INTO history (renterName, daterented, bikesid) VALUE (?, ?, ?,)");
$date = "'" . date"Y/m/d") . "'"
$stmt->blind_param("ssi", $_GET["renterName"], "'" . date("Y/m/d") . "'", $_GET["Id"]);

if ($stmt->execute() != true) {
	die("Error:" . $conn->error);
}

$sql = "UPDATE  bikes SET status='Rented' Where id=" . $_GET["Id"];
if ($conn->query($sql) === true) {
	echo "Success";
} else {
	die("Error:" . $conn->error);
}
?>
