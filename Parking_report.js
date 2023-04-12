fetch('Parking_data_report.json')
  .then(response => response.json())
  .then(data => {
    const parkingData = data;
    const lowUsed = document.getElementById('low-used');
    const lowFree = document.getElementById('low-free');
    const lowTotal = document.getElementById('low-total');
    const mediumUsed = document.getElementById('medium-used');
    const mediumFree = document.getElementById('medium-free');
    const mediumTotal = document.getElementById('medium-total');
    const highUsed = document.getElementById('high-used');
    const highFree = document.getElementById('high-free');
    const highTotal = document.getElementById('high-total');
    const totalUsed = document.getElementById('total-used');
    const totalFree = document.getElementById('total-free');
    const totalTotal = document.getElementById('total-total');

    // Populate the table with the data
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
  })
  .catch(error => console.error(error));