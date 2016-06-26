<?php

echo '<div id="respAlertDiv" style="display:none">';
	echo '<div class="alert alert-success text-center alert-dismissible" role="alert" id="suc"></div>';
	echo '<div class="alert alert-warning text-center alert-dismissible" role="alert" id="warn"></div>';
echo '</div>';
echo '<script type="text/javascript">';
echo '</script>';

		//$con = mysql_connect('localhost','root','');
		$con = new mysqli("localhost", "root", "", "zooom");
		//$con = mysqli_connect('localhost', 'root', '', 'zooom');
		session_start();
		if (!$con)
		{
			die('Could not connect');
		}
		
		$uname =trim( $_POST['username']);
		$pass = $_POST['password'];
		
     if($con)
	   {
		if($uname&&$pass)
		{
			$res = $con->query("Select *from login where user='$uname'");
			$n=$res->num_rows;
			$row = $res->fetch_assoc();
			   if($n>0)
				{
				   if(strcmp($row['pwd'],$pass)==0)
					 {
						$_SESSION['userid']=$row['id'];
						$_SESSION['username']=$row['user'];
						if(strcmp($row['user'],"admin")==0)
						{
							header("Location:events.php");
						}
						else
						{
							header("Location:maps.php");	
						}
					 }
				   else
					 {
						echo "<p>Username or password is incorrect,Enter correctly</p>";
					 }
				}
				else
				  {
				   echo "<p>Username or password is incorrect,if new user,Pls go back and signup to continue</p>";
				  }
	    }
      }
	  $con->close();
	  $res->close();
?>