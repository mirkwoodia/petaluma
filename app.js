function updateParkingData() {
  // get parking data values from form
  var lotA = document.getElementById("lotA").value;
  var lotB = document.getElementById("lotB").value;
  var lotC = document.getElementById("lotC").value;
  var lotD = document.getElementById("lotD").value;

  // create new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // set up POST request to parking.php
  xhr.open("POST", "parking.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // send parking data values as POST parameters
  xhr.send("lotA=" + lotA + "&lotB=" + lotB + "&lotC=" + lotC + "&lotD=" + lotD);
}

// define function to update total data
function updateTotalData() {
  // get total data values from form
  var totalVisitors = document.getElementById("totalVisitors").value;
  var totalRevenue = document.getElementById("totalRevenue").value;

  // create new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // set up POST request to total.php
  xhr.open("POST", "total.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // send total data values as POST parameters
  xhr.send("totalVisitors=" + totalVisitors + "&totalRevenue=" + totalRevenue);
}

// attach event listener to parking data update button
document.getElementById("updateParkingButton").addEventListener("click", updateParkingData);

// attach event listener to total data update button
document.getElementById("updateTotalButton").addEventListener("click", updateTotalData);