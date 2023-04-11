<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: Login_Member.html');
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>        
    <link rel="stylesheet" type="text/css" href="Ticket_Booth.css">
    <link rel="shortcut icon" type="image/x-icon" href="Tab.ico" />
    <title>Ticket Order Form</title>

    <style>

        input[id^=Qty] { width:5em; }
        td:first-child { width:80px; }
    </style>
</head>

<body>
    
    <form action="Ticket_Booth_Handler.php" method="POST">

        <label for="start">Purchase Date: </label>
        <input type="date" id="date" name="date" value="2023-03-28" min="2018-01-01" max="3000-12-31">

        <table border="1">

            <tr>
                <th>Ride</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>

            <tr>
                <td>Petaluma Wheel</td>
                <td><img style="display:block;" width="100%" height="100%" src="ferris.webp" alt = "Petaluma Wheel"></td>
                <td><input type="text" name="QtyWheel" id="QtyWheel"></td>
                <td>$10.25</td>
                <td id="Total Petaluma Wheel"></td>
            </tr>

            <tr>
                <td>Petaluma Speedway</td>
                <td><img style="display:block;" width="100%" height="100%" src="speed.webp" alt = "Petaluma Speedway"></td>
                <td><input type="text" name="QtySpeed" id="QtySpeed"></td>
                <td>$25.50</td>
                <td id="Total Petaluma Speed"></td>
            </tr>
            
            <tr>
                <td>Petaluma Aqua</td>
                <td><img style="display:block;" width="100%" height="100%" src="aqua.webp" alt = "Petaluma Aqua"></td>
                <td><input type="text" name= "QtyAqua" id="QtyAqua"></td>
                <td>$20.00</td>
                <td id="Total Petaluma Aqua"></td>
            </tr>
           
            <tr>
                <td>Petaluma Putt-Putt</td>
                <td><img style="display:block;" width="100%" height="100%" src="putt.webp" alt = "Petaluma Putt-Putt"></td>
                <td><input type="text" name="QtyPutt" id="QtyPutt"></td>
                <td>$30.50</td>
                <td id="Total Petaluma Putt"></td>
            </tr>

            <tr>
                <td>Total: </td>
                <td id="grandTotal" colspan="4"></td>
            </tr>
        </table>

        <!-- <input type="button" value="Get Grand Total">
        <input type="reset" value="Reset"> -->
        <button type="submit" name="submit">Purchase Now</button> 
    </form>

    <script>
    //getting references to the HTML elements that you'll be working with
        var qtyBoxA = document.getElementById('QtyWheel');
        var qtyBoxB = document.getElementById('QtySpeed');
        var qtyBoxC = document.getElementById('QtyAqua');
        var qtyBoxD = document.getElementById('QtyPutt');

        var totBoxA = document.getElementById('Total Petaluma Wheel');
        var totBoxB = document.getElementById('Total Petaluma Speed');
        var totBoxC = document.getElementById('Total Petaluma Aqua');
        var totBoxD = document.getElementById('Total Petaluma Putt');

        var grandTot = document.getElementById('grandTotal');
        var btnGetTot = document.querySelector("input[type=button]");
        var btnReset = document.querySelector("input[type=reset]");

        //set up event handling in JS, not HTML
        qtyBoxA.addEventListener("change", calc);
        qtyBoxB.addEventListener("change", calc); 
        qtyBoxC.addEventListener("change", calc); 
        qtyBoxD.addEventListener("change", calc); 
        btnGetTot.addEventListener("click", getGrandTotal); 
        btnReset.addEventListener("click", reset); 

        var gt; //this will hold grand total

        function calc(){
            var priceWheel = 10.25; 
            var priceSpeed = 25.50; 
            var priceAqua = 20.00; 
            var pricePutt = 30.50; 
            gt = 0; 
        
            var qtyWheel = parseInt(qtyBoxA.value, 10); 
            var qtySpeed = parseInt(qtyBoxB.value, 10); 
            var qtyAqua = parseInt(qtyBoxC.value, 10); 
            var qtyPutt = parseInt(qtyBoxD.value, 10); 

            if(!isNaN(qtyWheel)) {totBoxA.textContent = qtyWheel * priceWheel; gt += +totBoxA.textContent; }
            if(!isNaN(qtySpeed)) {totBoxB.textContent = qtySpeed * priceSpeed; gt += +totBoxB.textContent; }
            if(!isNaN(qtyAqua)) {totBoxC.textContent = qtyAqua * priceAqua; gt += +totBoxC.textContent; }
            if(!isNaN(qtyPutt)) {totBoxD.textContent = qtyPutt * pricePutt; gt += +totBoxD.textContent; }

            grandTot.textContent = gt.toFixed(2); //just place the answer in an element as its text

        }

        function getGrandTotal(){
            //make sure all values are up to date
            calc(); 
            alert(gt); 
        }

        function reset(){
            totBoxA.textContent = ""; 
            totBoxB.textContent = ""; 
            totBoxC.textContent = ""; 
            totBoxD.textContent = ""; 
            grandTot.textContent = ""; 
        }
    </script>    

</body>
</html>
