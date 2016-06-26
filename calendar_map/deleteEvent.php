<?php
	session_start();
	$con = new mysqli("localhost", "root", "", "zooom");
	if (!$con)
	{
		die('Could not connect');
	}
	$id = $_REQUEST['Id'];
	$con->query("delete from events where id='".$id."';");
	if(!$con->affected_rows)
	{
		echo "<strong>Not deleted</strong>";
	}
	else
	{
		echo "<strong>Deleted Successfully</strong>";
	}
	$con->close();
	
?>