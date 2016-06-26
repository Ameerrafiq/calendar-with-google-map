<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Zooom Calendar</title>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css" />
</head>

<body id="page-top" data -spy="scroll" data -target=".navbar-fixed-top">
	<script type="text/javascript">
	function validate(form)
	{
	var user=form.username.value;
	var password=form.password.value;
	if(user==""||user==null)
	{
	alert("enter the user name");
	return false;
	}
	var letters = /^[A-Za-z]+$/;  
	if(!(user.match(letters)))   
	{
	alert("enter only alphabets");
	return false;
	}
	if(password==""||password==null)
	{
	alert("enter the password");
	return false;
	}
	}
	function ValidateNameLength(ret, from)
		{
			if(from == 1)
			{
				if(ret.value.indexOf('\\') !== -1 || ret.value.indexOf('&') !== -1 || ret.value.indexOf("'") !== -1 || ret.value.indexOf('"') !== -1 || ret.value.indexOf('+') !== -1)
				{
					alert(lang_login_ary['Signup_Pwd_Spl_Char']);
					ret.value = "";
					return false;
				}
				if(ret.value.length > 32){
					alert(lang_login_ary['pswd_xceed_256']);
					ret.value = "";
					ret.focus();
					return false;
				}
			}
			if(from == 0){
				if(ret.value.length > 32){	
					alert(lang_login_ary['user_name_xceed_256']);
					ret.value = "";
					ret.focus();
					return false;
				}
			}
			if(from == 2)
			{
				if(ret.value.length > 32){
					alert("Please enter the correct password");
					ret.value = "";
					ret.focus();
					return false;	
				}
			}
			if((ret.value == "Email ID") || (ret.value == "Password"))
			{
				ret.value = "";
			}
			return 1;
		}
	</script>
	<br > <br > <br > <br > <br > <br > <br > <br >
	<div class="container">
		<div class="row">
				<form onsubmit="return validate(this);" action="loginverify.php" method="post" name="login_form" id="login_form">
					<div class="col-md-4 col-md-offset-4">
						
							<input type="text" autofocus="" placeholder="Username" class="form-control" tabindex="1" onkeyup="javascript:ValidateNameLength(this, 0);" name="username" id="username" required>
							<br />
							<input type="password" placeholder="Password" class="form-control" tabindex="2" onkeyup="javascript:ValidateNameLength(this, 1);" name="password" id="password" required>
							<br >
					</div>
					<div class="row">
						<div  class="col-md-4 col-md-offset-4">
							<button type="submit" class="btn btn-success btn-block" id="btnLogin"><i class="fa fa-unlock-alt fa-fw"></i>Login</button>
							<!--<a href="contact.html"><button type="submit" class="btn btn-success btn-block" id="btnRegister">Register</button></a>-->
						</div>
					</div>
				</form>
		</div>
	</div>
</body>
</html>