<?php
	session_start();
	$con = new mysqli("localhost", "root", "", "zooom");
	if (!$con)
	{
		die('Could not connect');
	}
	$id = $_REQUEST['Id'];
	$user = $_REQUEST['User'];
	$attend = 1;
	$con->query("INSERT INTO event_tracker VALUES ('".$user."','".$attend."','".$id."');");
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