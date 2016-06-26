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
        margin-left: 40px;
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
	  
	  #cat-type {
        margin-left: 1000px;
		padding: 0 11px 0 13px;
		font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
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
    </style>';
echo '</head>';
	session_start();
	$con = new mysqli("localhost", "root", "", "zooom");
	if (!$con)
	{
		die('Could not connect');
	}
echo '<body>

	<div id="respAlertDiv" style="display:none">
			<div class="alert alert-success alert-dismissible" role="alert" id="suc"></div>
			<div class="alert alert-warning alert-dismissible" role="alert" id="warn"></div>
	</div>';
echo '<br >';	
echo '<div class="container">
		<nav class="navbar navbar-default">
		<div class="container-fluid">
			<p class="navbar-text navbar-right">';
			if(isset($_SESSION['userid'])==1)
			echo $_SESSION['username']."  Logged in</p>";

			if(isset($_SESSION['userid'])==1)
			echo "<p><a href='signout.php'>Signout</p></a>";

	echo '</div>
		</nav>
	  </div>';
	  //MYSQLI_PHP
echo '<br >
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-10 col-md-offset-1" >
				<div id="map"  style="width:1000px;height:350px"> </div>
			</div>
		</div>
	</div>
	<br > 
	<input id="pac-input" class="controls" type="text" placeholder="Search Box">
	<button id="cat-type" type="button" class="btn-primary" onClick="displayMarkers(1);">Cat A</button>
	<br ><br >
	<button id="cat-type" type="button" class="btn-primary" onClick="displayMarkers(2);">Cat B</button>
	<br ><br >
	
	<div class="row">
		<div class="col-md-11 col-md-offset-1">
			<div class="col-md-8">
				
					<div class="panel panel-default">
						<div class="panel-heading">Category A</div>
					</div>
			</div>
			<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">Category B</div>
					</div>
			</div>';
		   if($con)
		   {
				$res = $con->query("Select *from events limit 10");
				$n=$res->num_rows;
				$allcat = 0;
				while($row = $res->fetch_assoc())
				{
					echo '<input type="hidden" id="Id'.$allcat.'" name="Id'.$allcat.'" value="'.$row['id'].'"/>';
					echo '<input type="hidden" id="title'.$allcat.'" name="title'.$allcat.'" value="'.$row['title'].'"/>';
					echo '<input type="hidden" id="desc'.$allcat.'" name="desc'.$allcat.'" value="'.$row['desc'].'"/>';
					echo '<input type="hidden" id="address'.$allcat.'" name="address'.$allcat.'" value="'.$row['address'].'"/>';
					echo '<input type="hidden" id="zip'.$allcat.'" name="zip'.$allcat.'" value="'.$row['zip'].'"/>';
					echo '<input type="hidden" id="mailid'.$allcat.'" name="mailid'.$allcat.'" value="'.$row['mailid'].'"/>';
					echo '<input type="hidden" id="country'.$allcat.'" name="country'.$allcat.'" value="'.$row['country'].'"/>';
					echo '<input type="hidden" id="startdate'.$allcat.'" name="startdate'.$allcat.'" value="'.$row['startdate'].'"/>';
					echo '<input type="hidden" id="enddate'.$allcat.'" name="enddate'.$allcat.'" value="'.$row['enddate'].'"/>';
					echo '<input type="hidden" id="category'.$allcat.'" name="category'.$allcat.'" value="'.$row['category'].'"/>';
					echo '<input type="hidden" id="lat'.$allcat.'" name="lat'.$allcat.'" value="'.$row['lat'].'"/>';
					echo '<input type="hidden" id="long'.$allcat.'" name="long'.$allcat.'" value="'.$row['longd'].'"/>';
					
					if(strcmp($row['category'],"A")==0)
					{
						  echo'
						  <div class="col-md-8">
								<div class="col-md-8 col-md-offset-2">
									<div class="panel panel-default">
									  <div class="panel-heading">'.$row["title"].'</div>
										<div class="panel-body">
											<ul class="inline">
												<li>'.$row["startdate"].' - '.$row["enddate"].'</li>
												<li>'.$row["desc"].'</li>
												<li>'.$row["address"].'</li>
												<li>'.$row["country"].'</li>
												<button id="catshowA" type="button" onClick="geocodeLatLng('.$allcat.')">Show on Map</button>
											</ul>
										</div>
									</div>
								</div>
						   </div>';
					}
					else
					{
							 echo'
							 <div class="col-md-4">
								<div class="panel panel-default">
								  <div class="panel-heading">'.$row["title"].'</div>
										<div class="panel-body">
											<ul class="inline">
												<li>'.$row["startdate"].' - '.$row["enddate"].'</li>
												<li>'.$row["desc"].'</li>
												<li>'.$row["address"].'</li>
												<li>'.$row["country"].'</li>
												<button id="catshowB" type="button" onClick="geocodeLatLng('.$allcat.')">Show on Map</button>
											</ul>
										</div>
								</div>
							</div>';
					}
					$allcat++;
				}
		  }
		  $attendQuery = "Select *from event_tracker where user_id='".$_SESSION['userid']."';";
		  $res = $con->query($attendQuery);
		  $n = $res->num_rows;
		  $attCount = 0;
		  while($row = $res->fetch_assoc())
		  {
			echo '<input type="hidden" id="eventid'.$attCount.'" name="eventid'.$attCount.'" value="'.$row['event_id'].'"/>';
			echo '<input type="hidden" id="attend'.$attCount.'" name="attend'.$attCount.'" value="'.$row['attend'].'"/>';
			$attCount++;
		  }
		  $con->close();
		echo '</div>
	</div>
</div>
<input type="hidden" id="cat_count" name="cat_count" value="'.$allcat.'">
';
	  echo '</body>';
	  
	  echo '<script>
	  function alerttime(){
			$("#respAlertDiv").slideDown(500, function() {
					$("#respAlertDiv").delay(3000).slideUp(500);
			}); 
		}
	  var geocoder;
	  var map;
	  var bounds;
	  var searchBox;
	  var infowindow;
	  var markers = [];
	  var count_cat = document.getElementById("cat_count").value;
	  var locations = [];
	  function initialize(s) {
		searchBox = new google.maps.places.SearchBox(document.getElementById("pac-input"));
		bounds = new google.maps.LatLngBounds();
		infowindow = new google.maps.InfoWindow();
		geocoder = new google.maps.Geocoder();
		newMarker = new google.maps.Marker();
		var latlng = new google.maps.LatLng(34.397, 50.644);
		var mapOptions = {
		  zoom: 3,
		  center: latlng,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		map = new google.maps.Map(document.getElementById("map"), mapOptions);
		
		//var z = 0;
		
		for(var x = 0; x < count_cat ; x++){
			
			var attCnt = '.$attCount.';
			locations[x] = [];
			var y = 0;
			var eventID1 = document.getElementById("Id"+x).value;
			var addr1 = document.getElementById("address"+x).value;
			var lat1 = document.getElementById("lat"+x).value;
			var long1 = document.getElementById("long"+x).value;
			var categ1 = document.getElementById("category"+x).value;
			var start_dat = document.getElementById("startdate"+x).value;
			var end_dat = document.getElementById("enddate"+x).value;
			var title = document.getElementById("title"+x).value;
			var country = document.getElementById("country"+x).value;
			var desc = document.getElementById("desc"+x).value;
			locations[x][y++] = addr1;
			locations[x][y++] = lat1;
			locations[x][y++] = long1;
			locations[x][y++] = categ1;
			locations[x][y++] = start_dat;
			locations[x][y++] = end_dat;
			locations[x][y++] = title;
			locations[x][y++] = country;
			locations[x][y++] = desc;
			';?>
			locations[x][y++] = '<div id="content">'+
			  '<div id="siteNotice">'+
			  '</div>'+
				'<h1 id="firstHeading" class="firstHeading">'+locations[x][6]+'</h1>'+
				'<div id="bodyContent btnId">'+
					'<div class="panel panel-default">'+
					  '<div class="panel-heading">'+locations[x][3]+'</div>'+
						'<div class="panel-body">'+
							'<ul class="inline">'+
								'<li>'+locations[x][4]+' - '+locations[x][5]+'</li>'+
								'<li>'+locations[x][0]+'</li>'+
								'<li>'+locations[x][7]+'</li>'+
								'<br >'+
								'<li>'+locations[x][8]+'</li>'+
							'</ul>'+
					   '</div>'+
				   '</div>'+
				  ' <button type="button" id="attndbtn'+x+'" onClick="attendEvent('+x+')">Attend</button> '+
				  ' <button type="button" id="Notattndbtn'+x+'" style="display:none" disabled>>Attend</button> '+
				'</div>'+
			  '</div>';
		<?php
			echo '
			
			if(x < attCnt)
			{
				var userAttndId = document.getElementById("eventid"+x).value;
				if(eventID1 === userAttndId)
				{
					//document.getElementById("Notattndbtn").style.display = "block";
				}
				else
				{
					//document.getElementById("attndbtn"+x).style.display = "block";
				}
				
			}
			
			
		}

		var k, newMarker;
		for (k = 0; k < locations.length; k++) {
			newMarker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[k][1], locations[k][2]),
			map: map,
			title: locations[k][0]
		  });
		  
		  
		  google.maps.event.addListener(newMarker, "click", (function(newMarker, i) {
			return function() {
					infowindow.setContent(locations[i][9]);
					infowindow.open(map, newMarker);
				}
			}) (newMarker, k));

		  newMarker.category = locations[k][3];     
		  newMarker.setVisible(false);

		  markers.push(newMarker);
		}
		var input = document.getElementById("pac-input");
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		map.addListener("bounds_changed", function() {
			searchBox.setBounds(map.getBounds());
		});
		  
		var markers1 = [];
		searchBox.addListener("places_changed", function() {
	    var places = searchBox.getPlaces();

		if (places.length == 0) {
			return;
		}

		  // Clear out the old markers1.
		  markers1.forEach(function(marker) {
			marker.setMap(null);
		  });
		  markers1 = [];
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
			markers1.push(new google.maps.Marker({
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
		
		var boundsListener = google.maps.event.addListener((map), "bounds_changed", function(event) {
			this.setZoom(3);
			google.maps.event.removeListener(boundsListener);
		});
	
		displayMarkers(1);
	  }
	  
	  function displayMarkers(category) {
			 
			 var i;
			 if(category == 1)
			 {	
				category1 = "A";
			 }
			 else
			 {
				category1 = "B";
			 }
			 for (i = 0; i < markers.length; i++) {
				
			   if (markers[i].category == category1) {
				 markers[i].setVisible(true);
			   }
			   else {
				 markers[i].setVisible(false);
			   }
			 }
	   }
	  
	  function attendEvent(y){
		var id1 = document.getElementById("Id"+y).value;
		alert(id1);
		$.ajax({
				type: "POST",
				url: "attendEvent.php",
				data: {
					Id : id1,
					User : '.$_SESSION['userid'].',
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
	  
	  function geocodeLatLng(j) {
	  
			var lat1 = document.getElementById("lat"+j).value;
			var long1 = document.getElementById("long"+j).value;
			var latlng = {lat: parseFloat(lat1), lng: parseFloat(long1)};
			geocoder.geocode({"location": latlng}, function(results, status) {
				if (status === google.maps.GeocoderStatus.OK) {
				  if (results[1]) {
					marker = new google.maps.Marker({
					  position: latlng,
					  map: map
					});
					infowindow.setContent(locations[j][9]);
					infowindow.open(map, marker);
				  } else {
					window.alert("No results found");
				  }
				} else {
				  window.alert("Geocoder failed due to: " + status);
				}
			  });


	  }
	  
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOTTIwUHMmqHu13FFyaCGDN2xrlZeTOUw&libraries=places&callback=initialize"
         async defer>
	</script>';