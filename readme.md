Theme Park Database: Petaluma Theme Park

Table of Contents
    1.Introduction
    2.Installation
    3.User Authentication
    4.Data Entry
    5.Triggers
        i. Parking Trigger
    6. Data Reports/Queries 
        i. Attraction Data Report 
        ii. Revenue Data Report 
        iii. Parking Data Report
    7. Contributors

1. Introduction

The Petaluma Theme Park is an online amusement park website. The first member role on the site is a member. A member can create an account, purchase tickets, get parking permits, use their tickets, and see their account information. The second member role on the site is an administrator. An administrator can edit or delete maintenance requests and can generate data reports to see information about the park’s attractions, parking, and revenue.

2. Installation

You can access the live version of the site here: http://164.152.23.142/

(Note: the following instructions require you to use a machine with MySQL, PHP, and an Apache, XAMPP, or other web server installed)

To run the site locally, follow these steps:

Navigate to the codebase at: https://github.com/mirkwoodia/petaluma
Download or fork the entire codebase
Verify that you have MySQL, PHP, and a web server installed (these instructions will assume you have XAMPP installed)
Navigate to: c:/xampp/htdocs/www and fork into this folder/drop the files here
Start the XAMPP application
Open: localhost/petaluma and find the ‘Home_Page.php’ file to access the home page

After completing these steps, you are able to use to the site.


3. User Authentication

    i. User Registration: Users can create member accounts by clicking on the “Member Login/Register” button
Password must be 5-20 characters long or the system will reject it.
Email should be a valid email or the system will print a “Not Valid Email” message (a valid email must include an ‘@’ symbol and a ‘.’ symbol).
Username should be unique, meaning if the inputted username is already in the database, the system will prompt the user to modify their username.
User must complete the whole form, or the system will prompt them to fill in the incomplete sections.

    ii. Member Login
Click “Member Login/Register” button on the top right of the Home Page.
Login using the username and password the member created at registration.
The system will check if the username and password exists in the database.
A Member is successfully logged in when they are redirected to the Home Page and a welcome message has their username printed (for example: “Welcome back, John”).
If the username and password are invalid the system will prompt the member to re-enter their credentials.
Here is a list of some example credentials you can use for testing:
Username: BBrown
Password: ilovebunnies
Username: PPeaches
Password: bowzer

    iii. Administrator Login
Click “Admin Login” on the top right of the Home Page.
The login for administrators is the same for members where the system will check if entered credentials exist in the database.
Once logged in, the administrator will be redirected to the Admin Portal where they will have access to many functions such as the Data Reports and Maintenance CRUD functions.
Here is a list of some example credentials you can use for testing: 
Username: admin
Password: 12345

    Logout 
The logout function is the same for members and administrators. Click on the “Logout” button which is located at the top right corner. Once that button is clicked, users will be redirected to the main home page.


3. Data Entry

i. Maintenance Form
To access this form on the live site, you must log in as an administrator (refer to the “User Authentication” section to do this).
Click the “More” button.
Click the “Maintenance” button.
Once here, you’ll see five maintenance forms. You can click the arrows at the bottom of the page to see more forms.
You can create a maintenance form by clicking the create button and entering the prompted information.
You can update a maintenance form by clicking the pencil icon, editing the values, and clicking save.
You can delete a maintenance form by clicking the trash icon.

ii. Ticket Booth Form
To access this form on the live site, you must log in as a member (refer to the “User Authentication” section to do this).
Click the “Ticket Booth” button.
Select a “Purchase Date”.
Enter an integer value (zero is valid) for each “Quantity” box.
Click the “Purchase Now” button to buy tickets.
The data entry form will check the member ID you are logged in as. Once you click the “Purchase Now” button, two things will happen:
First, your member ID and the amount of tickets you purchased will be entered into the database.
Second, a trigger goes off and updates the member’s available tickets based on what they just purchased.

iii. Attractions Form
To access this form on the live site, you must log in as a member (refer to the “User Authentication” section to do this).
Click the “Attractions” button.
There are four attractions in the Petaluma Theme Park. This form allows you to use your purchased tickets. Your amount of available tickets per ride is already loaded into the form.
To use your tickets, adjust the integer value in each attraction’s box to the amount you would like to use and click the “Spend Tickets” button.
Once you click the “Spend Tickets” button, your amount of available tickets will be updated in the database.

iv. Member Registration Form
To access this form on the live site, you must not be logged in as either a member or an administrator.
Click the “Member Login/Register” button.
Click the “Create An Account” button.
Complete all sections of the “Create Account” form.
The phone number must be entered in the format: ###-###-#### (each set of number separated by a dash symbol).
The email address must include an ‘@’ symbol and a ‘.’ symbol.
The password must be between 5 and 20 characters in length.
User must complete the whole form, or the system will prompt them to fill in the incomplete sections.
Click the “Create Account” button to have your profile information entered into the database.

v. Get Parking form
This is pulling from the member and get_parking_pass tables
To access this form on the live site, you must not be logged in as a member
In the landing home page, click the “Get Parking” button
As a member you can select a parking lot
As a member you must provide a license plate, up to 7 seven characters with only numbers and letters allowed.
So that you can see that the parking pass is working and updating the tables in the parking report for the admin, I set the validity time for the parking passes to 50 seconds.
If a parking lot is full then the user will not be allowed to get a parking pass to that lot, and will be displayed with “Parking lot is full, cannot sign up for a parking pass.”
The form is also checking the database to not allow duplicate license plates, if there are duplicate license plates the user will see “Error: license plate is already being used”.


5. Triggers

i. Get Parking Report Trigger:
This trigger is located in the get_parking_pass table
It will keep the parking report Available slots numbers updated. When a member gets a parking pass, depending on the lot the member chooses, the availability will go down by one, and when the expiration time passes for that parking pass, the number will go up by one.
The constraint for this trigger is that if a member tries to get a parking pass on a lot that is full (in this case I set parking lot A as to be set to 0 so that you can see the constraint being enforced) then the user will see this message “Parking lot is full, cannot sign up for a parking pass.” and they will be unable to get a parking pass for that lot, but they can get one for any other lot that does have availability.
Data Reports/Queries

ii. Attraction Data Report
To access this form on the live site, you must log in as an administrator (refer to the “User Authentication” section to do this).
Click the “More” button.
Click the “Attraction Report” icon (the furthest left one).
Choose the ride you would like to generate the report on from the drop-down list.
Click the “Generate Report” button.
Once the “Generate Report” button is clicked, you will see three data tables:
The first table “All Maintenances” is all the data from the maintenances of that specific ride including the maintenance entry’s name, description, start time, and end time.
The second table “All Visitors” is the data of quantity of tickets purchased on a certain date.
The third table “Total Visitors and Maintenances for this Ride” is a summary which shows the total amount of visitors and maintenances for the chosen ride.


iii. Revenue Data Report
To access this form on the live site, you must log in as an administrator (refer to the “User Authentication” section to do this).
Click the “More” button.
Click the “Revenue Report” icon (the furthest right one).
Input the start and end dates you would like to generate the report on.
To see the data presented in class, select “01/01/2023” as the start date and “04/13/2023” as the end date.
Click the “Generate Report” button.
Once the “Generate Report” button is clicked, you will see three tables:
The first table “Total Ticket Revenue” is all of the data for any date between the inputted start and end dates. This table includes the date, the quantity of each ticket purchased on that date, and the total revenue for that date. The total amount of ticket revenue between the inputted start and end dates is shown directly below this table.
The second table “Revenue Details Per Attraction” is all of the data for each of the park’s attractions. This table includes the attraction’s names, the attraction’s price, the total amount of tickets purchased for each attraction between the inputted start and end dates, and the total revenue for each attraction between the inputted start and end dates.
The third table “Total Gift Shop Revenue” is all of the data for any date between the inputted start and end dates. This table includes the date, the quantity of items purchased, the price of those items, and the total revenue for that date. The total amount of gift shop revenue between the inputted start and end dates is shown directly below this table.

iv. Parking Data Report
This is pulling from the getParking.php form that the member can access. Also updated the get_parking_pass tables, and “parking_slots” table.
To access this form on the live site, you must log in as an administrator (refer to the “User Authentication” section to do this).
Click the “More” button.
Click the “Parking” icon (the middle one).
Once you are in the parking report, you will see two tables. The first table is showing you the parking lots and the availability of slots and total slots for each parking lot. It is updated depending on members that login and choose a parking spot.
The second table is updated depending on members that login and choose a parking spot. So if a member were to login and choose a parking lot B, they would appear underneath the lot B cell, and the information that would be displayed on the report is their username, license plate, and expiration time. 
Once the members' time has run out, they will no longer show in the report. Both tables will update, the first table will increment the parking lot which the member chooses by one, and the second table will be updated to no longer show the members information. After the parking pass has expired the member can get another parking pass.



7. Contributors

Nader Elasmar
Maryann Tran
Matthew Woodring
Armando Cecilio
