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
	$idd = '';
	$con->query("INSERT INTO events VALUES ('".$idd."','".$title."','".$desc."','".$addr."','".$zip."','".$email."','".$country."','".$start_date."','".$end_date."','".$category."','".$lat."','".$longd."');");
	if(!$con->affected_rows)
	{
		echo "<strong>Not Added</strong>";
	}
	else
	{
		echo "<strong>Added Successfully</strong>";
	}
	$con->close();
	
?>