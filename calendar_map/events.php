<?php
echo '
<!DOCTYPE html>
<html>
 <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
   <meta charset="utf-8">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>'; 
echo '<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
	  #respAlertDiv{
		position:fixed;
		z-index:1130;
		left:40%;
		top:15%;
		}
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
	  [draggable=true] {
			cursor: move;
		}

		.resizable {
			resize: both;
		}
    </style>';

 echo '</head>';
	session_start();
	$con = new mysqli("localhost", "root", "", "zooom");
	if (!$con)
	{
		die('Could not connect');
	}
	echo '<body>';
echo '
	<div id="respAlertDiv" style="display:none">
			<div class="alert alert-success alert-dismissible" role="alert" id="suc"></div>
			<div class="alert alert-warning alert-dismissible" role="alert" id="warn"></div>
	</div>
	<div id="confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabe2" aria-hidden="true" >
		<div class="modal-dialog modal-sm">
		<div class="modal-body">
		Are you sure?
		</div>
		<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-primary" id="delete" onClick="deleteEvent();">Delete</button>
		<button type="button" data-dismiss="modal" class="btn">Cancel</button>
		</div>
		</div>
	</div>
<div class="modal fade" id="eventinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
	<div class="modal-content" id="eventinfobody">
	  <div id="messg" class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Enter event details</h4>
	  </div>
	  <div class="modal-body">';

	  
	 echo '<div id="logmodal">
		   </div>
			<form class="EditUserBody" role="form" id="addevent" method="POST">
			    <div class="row">
					<div class="col-md-4">
						  <div class="input-group">
							 <span class="input-group-addon">Title</span>
							 <input class="form-control" id="title" type="text" class="input-medium" />
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="input-group">
							 <span class="input-group-addon">Description</span>
							 <input class="form-control" id="desc" type="text" class="input-medium" />
						  </div>
					  </div>
				</div>
				<br >
				<div class="row">
					  <div class="col-md-6">
						  <div class="input-group">
							 <span class="input-group-addon">Address</span>
							 <textarea class="form-control" id="addr" style="min-width: 125%"></textarea>
						  </div>
					  </div>
				</div>
				<br >
				<div class="row">
					<div class="col-md-4">
						  <div class="input-group">
							 <span class="input-group-addon">Zip</span>
							 <input class="form-control" id="zip" type="text" class="input-medium" />
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="input-group">
							 <span class="input-group-addon">Mail id</span>
							 <input class="form-control" id="mail" type="text" class="input-medium" />
						  </div>
					  </div>
				</div>
				<br >
				<div class="row">
					<div class="col-md-4">
					  <div class="input-group">
						 <span class="input-group-addon">Country</span>
						 <select class="form-control" id="country">
								<option value="AF">Afghanistan</option>
								<option value="AX">Åland Islands</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AS">American Samoa</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
								<option value="BY">Belarus</option>
								<option value="BE">Belgium</option>
								<option value="BZ">Belize</option>
								<option value="BJ">Benin</option>
								<option value="BM">Bermuda</option>
								<option value="BT">Bhutan</option>
								<option value="BO">Bolivia, Plurinational State of</option>
								<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
								<option value="BA">Bosnia and Herzegovina</option>
								<option value="BW">Botswana</option>
								<option value="BV">Bouvet Island</option>
								<option value="BR">Brazil</option>
								<option value="IO">British Indian Ocean Territory</option>
								<option value="BN">Brunei Darussalam</option>
								<option value="BG">Bulgaria</option>
								<option value="BF">Burkina Faso</option>
								<option value="BI">Burundi</option>
								<option value="KH">Cambodia</option>
								<option value="CM">Cameroon</option>
								<option value="CA">Canada</option>
								<option value="CV">Cape Verde</option>
								<option value="KY">Cayman Islands</option>
								<option value="CF">Central African Republic</option>
								<option value="TD">Chad</option>
								<option value="CL">Chile</option>
								<option value="CN">China</option>
								<option value="CX">Christmas Island</option>
								<option value="CC">Cocos (Keeling) Islands</option>
								<option value="CO">Colombia</option>
								<option value="KM">Comoros</option>
								<option value="CG">Congo</option>
								<option value="CD">Congo, the Democratic Republic of the</option>
								<option value="CK">Cook Islands</option>
								<option value="CR">Costa Rica</option>
								<option value="CI">Côte dIvoire</option>
								<option value="HR">Croatia</option>
								<option value="CU">Cuba</option>
								<option value="CW">Curaçao</option>
								<option value="CY">Cyprus</option>
								<option value="CZ">Czech Republic</option>
								<option value="DK">Denmark</option>
								<option value="DJ">Djibouti</option>
								<option value="DM">Dominica</option>
								<option value="DO">Dominican Republic</option>
								<option value="EC">Ecuador</option>
								<option value="EG">Egypt</option>
								<option value="SV">El Salvador</option>
								<option value="GQ">Equatorial Guinea</option>
								<option value="ER">Eritrea</option>
								<option value="EE">Estonia</option>
								<option value="ET">Ethiopia</option>
								<option value="FK">Falkland Islands (Malvinas)</option>
								<option value="FO">Faroe Islands</option>
								<option value="FJ">Fiji</option>
								<option value="FI">Finland</option>
								<option value="FR">France</option>
								<option value="GF">French Guiana</option>
								<option value="PF">French Polynesia</option>
								<option value="TF">French Southern Territories</option>
								<option value="GA">Gabon</option>
								<option value="GM">Gambia</option>
								<option value="GE">Georgia</option>
								<option value="DE">Germany</option>
								<option value="GH">Ghana</option>
								<option value="GI">Gibraltar</option>
								<option value="GR">Greece</option>
								<option value="GL">Greenland</option>
								<option value="GD">Grenada</option>
								<option value="GP">Guadeloupe</option>
								<option value="GU">Guam</option>
								<option value="GT">Guatemala</option>
								<option value="GG">Guernsey</option>
								<option value="GN">Guinea</option>
								<option value="GW">Guinea-Bissau</option>
								<option value="GY">Guyana</option>
								<option value="HT">Haiti</option>
								<option value="HM">Heard Island and McDonald Islands</option>
								<option value="VA">Holy See (Vatican City State)</option>
								<option value="HN">Honduras</option>
								<option value="HK">Hong Kong</option>
								<option value="HU">Hungary</option>
								<option value="IS">Iceland</option>
								<option value="IN">India</option>
								<option value="ID">Indonesia</option>
								<option value="IR">Iran, Islamic Republic of</option>
								<option value="IQ">Iraq</option>
								<option value="IE">Ireland</option>
								<option value="IM">Isle of Man</option>
								<option value="IL">Israel</option>
								<option value="IT">Italy</option>
								<option value="JM">Jamaica</option>
								<option value="JP">Japan</option>
								<option value="JE">Jersey</option>
								<option value="JO">Jordan</option>
								<option value="KZ">Kazakhstan</option>
								<option value="KE">Kenya</option>
								<option value="KI">Kiribati</option>
								<option value="KP">Korea, Democratic Peoples Republic of</option>
								<option value="KR">Korea, Republic of</option>
								<option value="KW">Kuwait</option>
								<option value="KG">Kyrgyzstan</option>
								<option value="LA">Lao Peoples Democratic Republic</option>
								<option value="LV">Latvia</option>
								<option value="LB">Lebanon</option>
								<option value="LS">Lesotho</option>
								<option value="LR">Liberia</option>
								<option value="LY">Libya</option>
								<option value="LI">Liechtenstein</option>
								<option value="LT">Lithuania</option>
								<option value="LU">Luxembourg</option>
								<option value="MO">Macao</option>
								<option value="MK">Macedonia, the former Yugoslav Republic of</option>
								<option value="MG">Madagascar</option>
								<option value="MW">Malawi</option>
								<option value="MY">Malaysia</option>
								<option value="MV">Maldives</option>
								<option value="ML">Mali</option>
								<option value="MT">Malta</option>
								<option value="MH">Marshall Islands</option>
								<option value="MQ">Martinique</option>
								<option value="MR">Mauritania</option>
								<option value="MU">Mauritius</option>
								<option value="YT">Mayotte</option>
								<option value="MX">Mexico</option>
								<option value="FM">Micronesia, Federated States of</option>
								<option value="MD">Moldova, Republic of</option>
								<option value="MC">Monaco</option>
								<option value="MN">Mongolia</option>
								<option value="ME">Montenegro</option>
								<option value="MS">Montserrat</option>
								<option value="MA">Morocco</option>
								<option value="MZ">Mozambique</option>
								<option value="MM">Myanmar</option>
								<option value="NA">Namibia</option>
								<option value="NR">Nauru</option>
								<option value="NP">Nepal</option>
								<option value="NL">Netherlands</option>
								<option value="NC">New Caledonia</option>
								<option value="NZ">New Zealand</option>
								<option value="NI">Nicaragua</option>
								<option value="NE">Niger</option>
								<option value="NG">Nigeria</option>
								<option value="NU">Niue</option>
								<option value="NF">Norfolk Island</option>
								<option value="MP">Northern Mariana Islands</option>
								<option value="NO">Norway</option>
								<option value="OM">Oman</option>
								<option value="PK">Pakistan</option>
								<option value="PW">Palau</option>
								<option value="PS">Palestinian Territory, Occupied</option>
								<option value="PA">Panama</option>
								<option value="PG">Papua New Guinea</option>
								<option value="PY">Paraguay</option>
								<option value="PE">Peru</option>
								<option value="PH">Philippines</option>
								<option value="PN">Pitcairn</option>
								<option value="PL">Poland</option>
								<option value="PT">Portugal</option>
								<option value="PR">Puerto Rico</option>
								<option value="QA">Qatar</option>
								<option value="RE">Réunion</option>
								<option value="RO">Romania</option>
								<option value="RU">Russian Federation</option>
								<option value="RW">Rwanda</option>
								<option value="BL">Saint Barthélemy</option>
								<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
								<option value="KN">Saint Kitts and Nevis</option>
								<option value="LC">Saint Lucia</option>
								<option value="MF">Saint Martin (French part)</option>
								<option value="PM">Saint Pierre and Miquelon</option>
								<option value="VC">Saint Vincent and the Grenadines</option>
								<option value="WS">Samoa</option>
								<option value="SM">San Marino</option>
								<option value="ST">Sao Tome and Principe</option>
								<option value="SA">Saudi Arabia</option>
								<option value="SN">Senegal</option>
								<option value="RS">Serbia</option>
								<option value="SC">Seychelles</option>
								<option value="SL">Sierra Leone</option>
								<option value="SG">Singapore</option>
								<option value="SX">Sint Maarten (Dutch part)</option>
								<option value="SK">Slovakia</option>
								<option value="SI">Slovenia</option>
								<option value="SB">Solomon Islands</option>
								<option value="SO">Somalia</option>
								<option value="ZA">South Africa</option>
								<option value="GS">South Georgia and the South Sandwich Islands</option>
								<option value="SS">South Sudan</option>
								<option value="ES">Spain</option>
								<option value="LK">Sri Lanka</option>
								<option value="SD">Sudan</option>
								<option value="SR">Suriname</option>
								<option value="SJ">Svalbard and Jan Mayen</option>
								<option value="SZ">Swaziland</option>
								<option value="SE">Sweden</option>
								<option value="CH">Switzerland</option>
								<option value="SY">Syrian Arab Republic</option>
								<option value="TW">Taiwan, Province of China</option>
								<option value="TJ">Tajikistan</option>
								<option value="TZ">Tanzania, United Republic of</option>
								<option value="TH">Thailand</option>
								<option value="TL">Timor-Leste</option>
								<option value="TG">Togo</option>
								<option value="TK">Tokelau</option>
								<option value="TO">Tonga</option>
								<option value="TT">Trinidad and Tobago</option>
								<option value="TN">Tunisia</option>
								<option value="TR">Turkey</option>
								<option value="TM">Turkmenistan</option>
								<option value="TC">Turks and Caicos Islands</option>
								<option value="TV">Tuvalu</option>
								<option value="UG">Uganda</option>
								<option value="UA">Ukraine</option>
								<option value="AE">United Arab Emirates</option>
								<option value="GB">United Kingdom</option>
								<option value="US">United States</option>
								<option value="UM">United States Minor Outlying Islands</option>
								<option value="UY">Uruguay</option>
								<option value="UZ">Uzbekistan</option>
								<option value="VU">Vanuatu</option>
								<option value="VE">Venezuela, Bolivarian Republic of</option>
								<option value="VN">Viet Nam</option>
								<option value="VG">Virgin Islands, British</option>
								<option value="VI">Virgin Islands, U.S.</option>
								<option value="WF">Wallis and Futuna</option>
								<option value="EH">Western Sahara</option>
								<option value="YE">Yemen</option>
								<option value="ZM">Zambia</option>
								<option value="ZW">Zimbabwe</option>
							</select>
					  </div>
				  </div>
				  <div class="col-md-4">
						  <div class="input-group">
							 <span class="input-group-addon">Category</span>
							 <select class="form-control" id="category">
								<option value="A">A</option>
								<option value="B">B</option>
							</select>
						  </div>
				  </div>
				</div>
				<br >
				<div class="row">
					<div class="col-md-4">
						  <div class="input-group">
							 <span class="input-group-addon">Start-Date</span>
							 <input class="form-control" id="start-date" type="text" class="input-medium" />
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="input-group">
							 <span class="input-group-addon">End-Date</span>
							 <input class="form-control" id="end-date" type="text" class="input-medium" />
						  </div>
					  </div>
				</div>
				<br >
				<div class="row">
					<div class="col-md-4">
						  <div class="input-group">
							 <span class="input-group-addon">Latitude</span>
							 <input class="form-control" id="lat" type="text" class="input-medium" />
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="input-group">
							 <span class="input-group-addon">Longitude</span>
							 <input class="form-control" id="long" type="text" class="input-medium" />
						  </div>
					  </div>
				</div>
				<br >
				<input type="hidden" id="new_edit" name="new_edit" value="">
				<input type="hidden" id="new_id" name="new_id" value="">
				<input id="pac-input" class="controls" type="text" placeholder="Search Box">
				<div id="map" style="width:600px;height:300px"> </div>
			</form>
	  </div>
	   <div class="modal-footer">
		  <button type="submit" id="submit" class="btn btn-primary" onClick="addEvent();">Add Event</button>
		  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
	   </div>
	</div>
  </div>
</div>
<br >
<div class="container">
<nav class="navbar navbar-default">
<div class="container-fluid">
	<p class="navbar-text navbar-right">';
if(isset($_SESSION['userid'])==1)
echo $_SESSION['username']."  Logged in</p>";

if(isset($_SESSION['userid'])==1)
echo "<p><a href='signout.php'>Signout</p></a>";

echo '</div></nav></div>

<br > <br >';
	if($con)
	   {
			$res = $con->query("Select *from events");
			$n=$res->num_rows;
			while($row = $res->fetch_assoc())
			{
				$i = $row['id'];
			?>
				<div class="container resizable" draggable="true" id="eventList<?php echo $i ?>" >
				<?php
					echo '<div class="well">';
						echo '<div class="row">';
								echo '<input type="hidden" id="Id'.$i.'" name="Id'.$i.'" value="'.$row['id'].'"/>';
								echo '<input type="hidden" id="title'.$i.'" name="title'.$i.'" value="'.$row['title'].'"/>';
								echo '<input type="hidden" id="desc'.$i.'" name="desc'.$i.'" value="'.$row['desc'].'"/>';
								echo '<input type="hidden" id="address'.$i.'" name="address'.$i.'" value="'.$row['address'].'"/>';
								echo '<input type="hidden" id="zip'.$i.'" name="zip'.$i.'" value="'.$row['zip'].'"/>';
								echo '<input type="hidden" id="mailid'.$i.'" name="mailid'.$i.'" value="'.$row['mailid'].'"/>';
								echo '<input type="hidden" id="country'.$i.'" name="country'.$i.'" value="'.$row['country'].'"/>';
								echo '<input type="hidden" id="startdate'.$i.'" name="startdate'.$i.'" value="'.$row['startdate'].'"/>';
								echo '<input type="hidden" id="enddate'.$i.'" name="enddate'.$i.'" value="'.$row['enddate'].'"/>';
								echo '<input type="hidden" id="category'.$i.'" name="category'.$i.'" value="'.$row['category'].'"/>';
								echo '<input type="hidden" id="lat'.$i.'" name="lat'.$i.'" value="'.$row['lat'].'"/>';
								echo '<input type="hidden" id="long'.$i.'" name="long'.$i.'" value="'.$row['longd'].'"/>';
								echo '<div class="col-md-8">';
								echo 'Event '.$row['id'].' '.$row['title'].' / '.$row['country'].' :: '.$row['startdate'].' - '.$row['enddate'];
								echo '</div>';
								echo '<div class="col-sm-1">';
								echo '<button class="btn btn-default btn-success btn-sm" type="button" onClick="editEvent('.$row['id'].');">Edit</button>';
								echo '</div>';
								echo '<div class="col-sm-1">';
								echo '<button class="btn btn-default btn-success btn-sm" type="button" onClick="hideEvent('.$row['id'].');">Hide</button>';
								echo '</div>';
								echo '<div class="col-sm-1">';
								echo '<button class="btn btn-default btn-success btn-sm" type="button" onClick="showDeleteModal('.$row['id'].');">Delete</button>';
								echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
				$i++;
			}
      }
	  $con->close();
	 echo '<br ><br >
<div class="container">
  <div class="col-md-8 col-md-offset-5">
     <button class="btn btn-default btn-success btn-sm" type="button" onClick="showForm();">Add New Event</button>
  </div>
</div>
</body>
	<script type="text/javascript">
	function alerttime(){
			$("#respAlertDiv").slideDown(500, function() {
					$("#respAlertDiv").delay(3000).slideUp(500);
			}); 
	}
	function showForm()
	{
		document.getElementById("new_edit").value = 1;
		$("#eventinfo").modal("show");
		var formdata = document.getElementById("addevent");
		formdata.reset();
	}
	function editEvent(i)
	{
		document.getElementById("new_edit").value = 0;
		var id = document.getElementById("Id"+i).value;
		document.getElementById("new_id").value = id;
		var title = document.getElementById("title"+i).value;
		var desc = document.getElementById("desc"+i).value;
		var address = document.getElementById("address"+i).value;
		var zip = document.getElementById("zip"+i).value;
		var mailid = document.getElementById("mailid"+i).value;
		var country = document.getElementById("country"+i).value;
		var startdate = document.getElementById("startdate"+i).value;
		var enddate = document.getElementById("enddate"+i).value;
		var category = document.getElementById("category"+i).value;
		var lat = document.getElementById("lat"+i).value;
		var long = document.getElementById("long"+i).value;
		
		document.getElementById("title").value = title;
		document.getElementById("desc").value = desc;
		document.getElementById("addr").value = address;
		document.getElementById("zip").value = zip;
		document.getElementById("mail").value = mailid;
		document.getElementById("country").value = country;
		document.getElementById("category").value = category;
		document.getElementById("start-date").value = startdate;
		document.getElementById("end-date").value = enddate;
		document.getElementById("lat").value = lat;
		document.getElementById("long").value = long;
		$("#eventinfo").modal("show");
		
	}
	
	function showDeleteModal(i)
	{
		$("#confirm").modal("show");
		var id = document.getElementById("Id"+i).value;
		document.getElementById("new_id").value = id;
	}
	
	function deleteEvent()
	{
		var id = document.getElementById("new_id").value;
		$.ajax({
				type: "POST",
				url: "deleteEvent.php",
				data: {
					Id : id,
				},
				success: function(msg){
						$("#respAlertDiv").show();
					    $("#warn").hide();
					    alerttime();
						$("#suc").html(msg);
				 },
				error: function(msg){
						$("#respAlertDiv").show();
					    $("#suc").hide();
					    alerttime();
						$("#warn").html(msg);
				}
			});
	}
	
	function hideEvent(i)
	{
		document.getElementById("eventList"+i).style.visibility = "hidden";
	}
	
	function addEvent()
	{
		var new_edit = document.getElementById("new_edit").value;
		var title = document.getElementById("title").value;
		var desc = document.getElementById("desc").value;
		var addr = document.getElementById("addr").value;
		var zip = document.getElementById("zip").value;
		var mail= document.getElementById("mail").value;
		var country= document.getElementById("country").value;
		var categ= document.getElementById("category").value;
		var start_date= document.getElementById("start-date").value;
		var end_date= document.getElementById("end-date").value;
		var lat= document.getElementById("lat").value;
		var longd= document.getElementById("long").value;
		var new_id = document.getElementById("new_id").value;
		
		if(new_edit=="1")
		{
			$.ajax({
				type: "POST",
				url: "newEvent.php",
				data: {
					Title : title,
					Desc : desc,
					Addr : addr,
					Zip : zip,
					Mail : mail,
					Country : country,
					Category : categ,
					Start_date : start_date,
					End_date : end_date,
					Lat : lat,
					Longd : longd,
				},
				success: function(msg){
						$("#respAlertDiv").show();
					    $("#warn").hide();
					    alerttime();
						$("#suc").html(msg);
				 },
				error: function(msg){
						$("#respAlertDiv").show();
					    $("#suc").hide();
					    alerttime();
						$("#warn").html(msg);
				}
			});
		}
		else
		{
			$.ajax({
				type: "POST",
				url: "editEvent.php",
				data: {
					Title : title,
					Desc : desc,
					Addr : addr,
					Zip : zip,
					Mail : mail,
					Country : country,
					Category : categ,
					Start_date : start_date,
					End_date : end_date,
					Lat : lat,
					Longd : longd,
					New_Id : new_id,
				},
				success: function(msg){
						$("#respAlertDiv").show();
					    $("#warn").hide();
					    alerttime();
						$("#suc").html(msg);
				 },
				error: function(msg){
						$("#respAlertDiv").show();
					    $("#suc").hide();
					    alerttime();
						$("#warn").html(msg);
				}
			});
			
		}
	}
	
	function initAutocomplete() {
	
	var map = new google.maps.Map(document.getElementById("map"), {
	  center: {lat: -33.8688, lng: 151.2195},
	  zoom: 13,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var input = document.getElementById("pac-input");
	var searchBox = new google.maps.places.SearchBox(input);
	map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

	map.addListener("bounds_changed", function() {
	  searchBox.setBounds(map.getBounds());
	});
	
	google.maps.event.addListener(map,"click",function(event) {
		document.getElementById("lat").value = event.latLng.lat();
		document.getElementById("long").value = event.latLng.lng();
	});
	
	var markers = [];
	searchBox.addListener("places_changed", function() {
	  var places = searchBox.getPlaces();

	  if (places.length == 0) {
		return;
	  }

	  // Clear out the old markers.
	  markers.forEach(function(marker) {
		marker.setMap(null);
	  });
	  markers = [];
	  var bounds = new google.maps.LatLngBounds();
	  places.forEach(function(place) {
		var icon = {
		  url: place.icon,
		  size: new google.maps.Size(71, 71),
		  origin: new google.maps.Point(0, 0),
		  anchor: new google.maps.Point(17, 34),
		  scaledSize: new google.maps.Size(25, 25)
		};

		// Create a marker for each place.
		markers.push(new google.maps.Marker({
		  map: map,
		  icon: icon,
		  title: place.name,
		  position: place.geometry.location
		}));

		if (place.geometry.viewport) {
		  // Only geocodes have viewport.
		  bounds.union(place.geometry.viewport);
		} else {
		  bounds.extend(place.geometry.location);
		}
	  });
	  map.fitBounds(bounds);
	});
	}
	
	
    </script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOTTIwUHMmqHu13FFyaCGDN2xrlZeTOUw&libraries=places&callback=initAutocomplete"
         async defer>
	</script>';
	?>

	