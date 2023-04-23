**Theme Park Database: Petaluma Theme Park**

**Table of Contents**

- **Introduction**
- **Installation**
- **User Authentication**
- **Data Entry**
- **Triggers**
  - Parking Trigger
  -
- **Data Reports/Queries**
  - Attraction Data Report
  - Revenue Data Report
  - Parking Data Report
- **Contributors**

**Introduction**

The Petaluma Theme Park is an online amusement park website. The first member role on the site is a member. A member can create an account, purchase tickets, get parking permits, use their tickets, and see their account information. The second member role on the site is an administrator. An administrator can edit or delete maintenance requests and can generate data reports to see information about the park's attractions, parking, and revenue.

**Installation**

You can access the live version of the site here: [http://164.152.23.142/](http://164.152.23.142/)

(Note: the following instructions require you to use a machine with MySQL, PHP, and an Apache, XAMPP, or other web server installed)

To run the site locally, follow these steps:

1. Navigate to the codebase at: [https://github.com/mirkwoodia/petaluma](https://github.com/mirkwoodia/petaluma)
2. Download or fork the entire codebase
3. Verify that you have MySQL, PHP, and a web server installed (these instructions will assume you have XAMPP installed)
4. Navigate to: c:/xampp/htdocs/www and fork into this folder/drop the files here
5. Start the XAMPP application
6. Open: localhost/petaluma and find the 'Home\_Page.php' file to access the home page

After completing these steps, you are able to use to the site.

**User Authentication**

1. User Registration: Users can create member accounts by clicking on the "Member Login/Register" button
  1. Password must be 5-20 characters long or the system will reject it.
  2. Email should be a valid email or the system will print a "Not Valid Email" message (a valid email must include an '@' symbol and a '.' symbol).
  3. Username should be unique, meaning if the inputted username is already in the database, the system will prompt the user to modify their username.
  4. User must complete the whole form, or the system will prompt them to fill in the incomplete sections.

1. Member Login
  1. Click "Member Login/Register" button on the top right of the Home Page.
  2. Login using the username and password the member created at registration.
  3. The system will check if the username and password exists in the database.
  4. A Member is successfully logged in when they are redirected to the Home Page and a welcome message has their username printed (for example: "Welcome back, John").
    1. If the username and password are invalid the system will prompt the member to re-enter their credentials.
  5. Here is a list of some example credentials you can use for testing:
    1. Username: BBrown
 Password: ilovebunnies
    2. Username: PPeaches
 Password: bowzer

1. Administrator Login
  1. Click "Admin Login" on the top right of the Home Page.
  2. The login for administrators is the same for members where the system will check if entered credentials exist in the database.
  3. Once logged in, the administrator will be redirected to the Admin Portal where they will have access to many functions such as the Data Reports and Maintenance CRUD functions.
  4. Here is a list of some example credentials you can use for testing:

Username: admin
 Password: 12345

1. Logout
  1. The logout function is the same for members and administrators. Click on the "Logout" button which is located at the top right corner. Once that button is clicked, users will be redirected to the main home page.

**Data Entry**

1. Maintenance Form
  1. To access this form on the live site, you must log in as an administrator (refer to the "User Authentication" section to do this).
  2. Click the "More" button.
  3. Click the "Maintenance" button.
  4. Once here, you'll see five maintenance forms. You can click the arrows at the bottom of the page to see more forms.
  5. You can create a maintenance form by clicking the create button and entering the prompted information.
  6. You can update a maintenance form by clicking the pencil icon, editing the values, and clicking save.
  7. You can delete a maintenance form by clicking the trash icon.

1. Ticket Booth Form
  1. To access this form on the live site, you must log in as a member (refer to the "User Authentication" section to do this).
  2. Click the "Ticket Booth" button.
  3. Select a "Purchase Date".
  4. Enter an integer value (zero is valid) for each "Quantity" box.
  5. Click the "Purchase Now" button to buy tickets.
  6. The data entry form will check the member ID you are logged in as. Once you click the "Purchase Now" button, two things will happen:
    1. First, your member ID and the amount of tickets you purchased will be entered into the database.
    2. Second, a trigger goes off and updates the member's available tickets based on what they just purchased.

1. Attractions Form
  1. To access this form on the live site, you must log in as a member (refer to the "User Authentication" section to do this).
  2. Click the "Attractions" button.
  3. There are four attractions in the Petaluma Theme Park. This form allows you to use your purchased tickets. Your amount of available tickets per ride is already loaded into the form.
  4. To use your tickets, adjust the integer value in each attraction's box to the amount you would like to use and click the "Spend Tickets" button.
  5. Once you click the "Spend Tickets" button, your amount of available tickets will be updated in the database.

1. Member Registration Form
  1. To access this form on the live site, you must not be logged in as either a member or an administrator.
  2. Click the "Member Login/Register" button.
  3. Click the "Create An Account" button.
  4. Complete all sections of the "Create Account" form.
    1. The phone number must be entered in the format: ###-###-#### (each set of number separated by a dash symbol).
    2. The email address must include an '@' symbol and a '.' symbol.
    3. The password must be between 5 and 20 characters in length.
    4. User must complete the whole form, or the system will prompt them to fill in the incomplete sections.
  5. Click the "Create Account" button to have your profile information entered into the database.
2. Get Parking form

- This is pulling from the member and get\_parking\_pass tables

1. To access this form on the live site, you must not be logged in as a member
2. In the landing home page, click the "Get Parking" button
3. As a member you can select a parking lot
4. As a member you must provide a license plate, up to 7 seven characters with only numbers and letters allowed.
5. So that you can see that the parking pass is working and updating the tables in the parking report for the admin, I set the validity time for the parking passes to 50 seconds.
6. If a parking lot is full then the user will not be allowed to get a parking pass to that lot, and will be displayed with "Parking lot is full, cannot sign up for a parking pass."
7. The form is also checking the database to not allow duplicate license plates, if there are duplicate license plates the user will see "Error: license plate is already being used".

**Triggers**

1. Get Parking Report Trigger:
  1. This trigger is located in the get\_parking\_pass table
  2. It will keep the parking report Available slots numbers updated. When a member gets a parking pass, depending on the lot the member chooses, the availability will go down by one, and when the expiration time passes for that parking pass, the number will go up by one.
  3. The constraint for this trigger is that if a member tries to get a parking pass on a lot that is full (in this case I set parking lot A as to be set to 0 so that you can see the constraint being enforced) then the user will see this message "Parking lot is full, cannot sign up for a parking pass." and they will be unable to get a parking pass for that lot, but they can get one for any other lot that does have availability.
2. addTicketsToMember:
  1. This trigger is located in the ticket\_booth table
  2. It will add any tickets purchased in the ticket booth to the member table under their member\_ID
  3. Constraint: a member\_ID = 0 means this is a guest user and won't allow them to purchase tickets until they log in/make an account
  4. Action: An error message will appear on the page when a guest attempts to purchase tickets

**Data Reports/Queries**

1. Attraction Data Report
  1. To access this form on the live site, you must log in as an administrator (refer to the "User Authentication" section to do this).
  2. Click the "More" button.
  3. Click the "Attraction Report" icon (the furthest left one).
  4. Choose the ride you would like to generate the report on from the drop-down list.
  5. Click the "Generate Report" button.
  6. Once the "Generate Report" button is clicked, you will see three data tables:
    1. The first table "All Maintenances" is all the data from the maintenances of that specific ride including the maintenance entry's name, description, start time, and end time. This is queried from the "maintenance" table.
    2. The second table "All Visitors" is the data of quantity of tickets purchased on a certain date.
    3. The third table "Total Visitors and Maintenances for this Ride" is a summary which shows the total amount of visitors and maintenances for the chosen ride.

1. Revenue Data Report
  1. To access this form on the live site, you must log in as an administrator (refer to the "User Authentication" section to do this).
  2. Click the "More" button.
  3. Click the "Revenue Report" icon (the furthest right one).
  4. Input the start and end dates you would like to generate the report on.
    1. To see the data presented in class, select "01/01/2023" as the start date and "04/13/2023" as the end date.
  5. Click the "Generate Report" button.
  6. Once the "Generate Report" button is clicked, you will see three tables:
    1. The first table "Total Ticket Revenue" is all of the data for any date between the inputted start and end dates. This table includes the date, the quantity of each ticket purchased on that date, and the total revenue for that date. The total amount of ticket revenue between the inputted start and end dates is shown directly below this table.
    2. The second table "Revenue Details Per Attraction" is all of the data for each of the park's attractions. This table includes the attraction's names, the attraction's price, the total amount of tickets purchased for each attraction between the inputted start and end dates, and the total revenue for each attraction between the inputted start and end dates.
    3. The third table "Total Gift Shop Revenue" is all of the data for any date between the inputted start and end dates. This table includes the date, the quantity of items purchased, the price of those items, and the total revenue for that date. The total amount of gift shop revenue between the inputted start and end dates is shown directly below this table.

1. Parking Data Report

- This is pulling from the getParking.php form that the member can access. Also updated the get\_parking\_pass tables, and "parking\_slots" table.

  1. To access this form on the live site, you must log in as an administrator (refer to the "User Authentication" section to do this).
  2. Click the "More" button.
  3. Click the "Parking" icon (the middle one).
    1. Once you are in the parking report, you will see two tables. The first table is showing you the parking lots and the availability of slots and total slots for each parking lot. It is updated depending on members that login and choose a parking spot.
    2. The second table is updated depending on members that login and choose a parking spot. So if a member were to login and choose a parking lot B, they would appear underneath the lot B cell, and the information that would be displayed on the report is their username, license plate, and expiration time.
    3. Once the members' time has run out, they will no longer show in the report. Both tables will update, the first table will increment the parking lot which the member chooses by one, and the second table will be updated to no longer show the members information. After the parking pass has expired the member can get another parking pass.

**Contributors**

Nader Elasmar,

Maryann Tran,

Matthew Woodring,

Armando Cecilio,

Joshua Alegbe