<?php
	session_start();
	$con = new mysqli("localhost", "root", "", "zooom");
	if (!$con)
	{
		die('Could not connect');
	}
	$title = $_REQUEST['Title'];
	$desc = $_REQUEST['Desc'];
	$addr = $_REQUEST['Addr'];
	$zip = $_REQUEST['Zip'];
	$email = $_REQUEST['Mail'];
	$country = $_REQUEST['Country'];
	$category = $_REQUEST['Category'];
	$start_date = $_REQUEST['Start_date'];
	$end_date = $_REQUEST['End_date'];
	$lat = $_REQUEST['Lat'];
	$longd = $_REQUEST['Longd'];
	$new_id = $_REQUEST['New_Id'];
	$con->query("Update events set title='".$title."', desc='".$desc."', address='".$addr."', zip='".$zip."', mailid='".$email."', country='".$country."', startdate='".$start_date."', enddate='".$end_date."', category='".$category."', lat='".$lat."', longd='".$longd."' where id='".$new_id ."';");
	if(!$con->affected_rows)
	{
		echo "<strong>Not Updated</strong>";
	}
	else
	{
		echo $con->error."<strong>Updated Successfully</strong>";
	}
	$con->close();
	
?>