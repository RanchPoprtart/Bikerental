// Retrieve all Bike data
var data =  [ {
                "Id": "1",
				"description": "Kids Bike",
				"imagename": "kidsbike.jpg",
				"size": "20",
				"color": "pink",
				"status": "available"
			},   { 
                "Id": "2",
				"description": "Beach Cruiser ",
				"imagename": "kidsbike.jpg",
				"size": "20",
				"color": "pink",
				"status": "available"
			}];

			
function getAllBikes() {
	const xhr = new XMLHttpRequest();
	xhr.unload = function () {
		displayData(this.responseText);
	}
	xhr.open("get", "getAllBikes.php");
	xhr.send();
}
			//
		
			
function displayData(jsonString) {
	console.log(jsonString)
	var bikes = JSON.parse(jsonString);
	var output = "";
	
	for(bike of bikes) { 
		output += '<div class="listing"><img class="pic" src="'
		output += bike.imagename;
		output += '"><b>' + bike.description + '</b><br><span>Size: ' + bike.size;
		output += '"</span><br><span>Status:  ' + bike.status + '</span><br>';
		if (bike.status == "Available") {		
			output += '<button onclick="rentBike(' + bike.Id + ')">Rent</button></div>';
		} else {
			output += '<button onclick="returnBike(' + bike.Id + ')">Return</button></div>';
		}
			
	}
	document.getElementById("main").innerHTML = output;
}
		
	
		
function rentBike(bikeId) {
	console.log(bikeId);
	var renterName = prompt("What is your name?"); 
	if(!renterName) { 
		return; 
		}
	
	const xhr = new XMLHttpRequest();
	xhr.onload = function () {
		if (this.responseText == "Success") {
			getAllBikes();
		} else {
			console.log(this.responseText);
		}
		
	}
	xhr.open("get", "rentBike.php?renterName=" + renterName + "&Id=" + bikeId);
	xhr.send();
}
	
function returnBike(bikeId) {
	const xhr = new XMLHttpRequest();
	xhr.onload = function () {
		if (this.responseText == "Success") {
			getAllBikes();
		} else {
			console.log(this.responseText);
		}
		
	}
	xhr.open("get", "returnBike.php?Id=" + bikeId);
	xhr.send();
		
}
		
//displayData(data)
getAllBikes()
