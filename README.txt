@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ ===== Calendar with Google Map - Project ===== @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

Project description : 

This is the test project in which admin can add an event like in Google calendar with location and description, user can login and view the event and can click on attend to make him present at that event.


Project platform : 

This project is done using PHP, HTML, Javascript, jquery, AJAX (REST API), Bootstrap CSS, MySQL

PHP Version = 7.0.3

MySQL is persistent storage type.
mysqli is being used
Client API library version 	mysqlnd 5.0.12-dev - 20150407

Ajax for REST API to store and load data

Bootstrap and Jquery for UI responsiveness

To test this project : 

	1) Please find the schema file in following location : zooom_test/calendar_map/schema/
	2) Create a database name 'zooom' and import above sql tables in it.
	3) MySQL and PHP server should be installed in machine. 
	
	Note :
		
		MySQL : 
			Username for MySQL server is 'root',
			Host is 'localhost'
			No Password has been set for 'zooom' database
		
		Web : 
			For admin :
				Username : admin
				Password : secretpassword
			For end-user :
				Username : user
				Password : user
				
	4) Web page can be run using any php server.
	5) Sample snapshots has been taken for the project respective to phases for references
		Find it in : zooom_test/calendar_map/snapshot/
		
	6) Google Maps API has ben used for Map, infoWindow, marker, Geocode
	
	7) REST API's : 
			
			POST REQUEST :
				For ADMIN :
					ADD EVENT : http://localhost/newEvent.php (With respective url data for posting)
					EDIT EVENT : http://localhost/editEvent.php (With respective url data for posting)
					DELETE EVENT : http://localhost/deleteEvent.php (With respective url data for posting)
				
				For USER :
					ADD EVENT : http://localhost/attendEvent.php (With respective url data for posting)

@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
