// Load the initial data from the JSON file
let parkingData;
fetch('Parking_data_report.json')
  .then(response => response.json())
  .then(data => {
    parkingData = data;
    populateTable();
  })
  .catch(error => console.error(error));

// Listen for form submission
const parkingForm = document.getElementById('parking-form');
parkingForm.addEventListener('submit', handleSubmit);

// Populate the table with the current data
function populateTable() {
  const lowUsed = document.getElementById('low-used');
  const lowFree = document.getElementById('low-free');
  const lowTotal = document.getElementById('low-total');
  const mediumUsed = document.getElementById('medium-used');
  const mediumFree = document.getElementById('medium-free');
  const mediumTotal = document.getElementById('medium-total');
  const highUsed = document.getElementById('high-used');
  // Get the HTML elements for input and button
  const typeInput = document.getElementById('type-input');
  const usedInput = document.getElementById('used-input');
  const freeInput = document.getElementById('free-input');
  const totalInput = document.getElementById('total-input');
  const updateButton = document.getElementById('update-button');
}

// Update the JSON data when the button is clicked
updateButton.addEventListener('click', () => {
  const type = typeInput.value;
  const used = Number(usedInput.value);
  const free = Number(freeInput.value);
  const total = Number(totalInput.value);

  // Find the corresponding parking object in the JSON data and update it
  const parkingObject = parkingData.parking.find(parking => parking.type === type);
  if (parkingObject) {
    parkingObject.used = used;
    parkingObject.free = free;
    parkingObject.total = total;
    parkingData.total.used = parkingData.parking.reduce((acc, parking) => acc + parking.used, 0);
    parkingData.total.free = parkingData.parking.reduce((acc, parking) => acc + parking.free, 0);
    parkingData.total.total = parkingData.parking.reduce((acc, parking) => acc + parking.total, 0);
    updateTable();
  }
});

// Function to update the table with the new data
function updateTable() {
  lowUsed.textContent = parkingData.parking[0].used;
  lowFree.textContent = parkingData.parking[0].free;
  lowTotal.textContent = parkingData.parking[0].total;
  mediumUsed.textContent = parkingData.parking[1].used;
  mediumFree.textContent = parkingData.parking[1].free;
  mediumTotal.textContent = parkingData.parking[1].total;
  highUsed.textContent = parkingData.parking[2].used;
  highFree.textContent = parkingData.parking[2].free;
  highTotal.textContent = parkingData.parking[2].total;
  totalUsed.textContent = parkingData.total.used;
  totalFree.textContent = parkingData.total.free;
  totalTotal.textContent = parkingData.total.total;
}