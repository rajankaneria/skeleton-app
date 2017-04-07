#Zend Framework 2 and Doctrine 2 (CRUD Code Test)

##Test Rules
------------
1. Commit your code to Github every 30 minutes.
2. Complete the test in 4 hours or less. Spend up to 30 minutes documenting your work.
3. When the test is completed Take screenshots of the completed/working test and submit.

##Instructions
--------------
1) Make a simple API using Zend Framework 2 and Doctrine 2 to store information about users in a MySQL database.
2) Fully implement CRUD so your code can create, read, update and delete the entries.
3) Return an index of entered entries so they can be displayed in a list
4) The information to store and retrieve is as follows
a) User Name
b) Full Name
c) Email
d) Phone Number
e) Address
5) Results from API should be returned as JSON
6) Data passed into the API can be passed as POST Params
7) Front end for functionality is not required, but bonus points may be given for one
8) For bonus points make your API restful, leveraging POST, GET, PUT, DELETE to leverage the crud functionality.


##Documentation
---------------
You will find 2 modules in this skeleton apart from default modules
1) For frontend web interface (User)
2) For REstfulAPI (Userapi)


#User module
------------
This has 2 pages
1) /user/index : Shows all the users from the dabase into a table. You can also delete or update user details from this page
2) /user/add   : This page can be used to insert user into database

#REstfulAPI Userapi Module
--------------------------
I could not spend much time on this module but I have created basic things which I am listing below
1) /userapi/getAll : Gets all the users from the database and returns them in json format
2) /userapi/add    : Adds a user into the database. Accepts user data through post variable
3) /userapi/update : Updates userdetails in the database.
4) /userapi/delete : Deletes a user. Need to pass User ID in post
5) /userapi/get    : Gets a specific user's details when user id is passed


For any questions or problems feel free to email me: Rajan Kaneria - rajan.kaneria@gmail.com
