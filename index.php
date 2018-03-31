<?php
	$ip = $_POST['ip'];
    $loc = file_get_contents("https://ipapi.co/" .$ip. "/json/");
    $obj = json_decode($loc);

  
  
// set the api key and ip to be validated
$apiKey = 'Rj6uJvf4gwLecz7Th3HYXNVtraEoABM5';
//
// use curl to make the request
$url = 'http://hyper.proxyrotator.com/detector/?apiKey='.$apiKey.'&ip='.$ip;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
$response = curl_exec($ch);
curl_close($ch);

// decode the json response
$json = json_decode($response, true);

// check if a proxy was found or not
if($json['status'] == 'proxyDetected'){
    echo "<span style='color:red;'>Proxy User Detected</span>";
   // user is using a known proxy address
}ELSE if($json['status'] == 'torDetected'){
    echo "<span style='color:red;'>Tor User Detected</span>";
   // user is using a known tor exit node address
}ELSE if($json['status'] == 'vpnDetected'){
   // user is using a vpn server
    echo "<span style='color:red;'>VPN User Detected</span>";
}
else{
    echo "";
}



?>



<!DOCTYPE html>
<html>
<head>
	<title>IP to Location Tracker</title>
</head>
<body>
	
	<br><br>
	<center><h1>IP to Location Tracker that detect also Proxy or VPN or Tor</h1></center>
<br>
<br>
<form method="post" action="">
	<input type="text" name="ip">
	<input type="submit" name="Submit" value="submit">

</form>
<br>


<table>
	<tr>
		<td>IP Address :</td>
		<td><?php echo $obj -> ip; ?></td>
	</tr>
	<tr>
		<td>Country Name :</td>
		<td><?php echo $obj -> country_name; ?></td>
	</tr>
	<tr>	
		<td>Country Code :</td>
		<td><?php echo $obj -> country; ?></td>
	</tr>
	<tr>	
		<td>City :</td>
		<td><?php echo $obj -> city; ?></td>
	</tr>
	<tr>	
		<td>Region :</td>
		<td><?php echo $obj -> region; ?></td>
	</tr>
	<tr>	
		<td>Region Code :</td>
		<td><?php echo $obj -> region_code; ?></td>
	</tr>
	<tr>	
		<td>Continent Code :</td>
		<td><?php echo $obj -> continent_code; ?></td>
	</tr>
	<tr>	
		<td>Postal Code :</td>
		<td><?php echo $obj -> postal; ?></td>
	</tr>
	<tr>	
		<td>Latitude :</td>
		<td><?php echo $obj -> latitude; ?></td>
	</tr>
	<tr>	
		<td>Longitude :</td>
		<td><?php echo $obj -> longitude; ?></td>
	</tr>
	<tr>	
		<td>Timezone :</td>
		<td><?php echo $obj -> timezone; ?></td>
	</tr>
	<tr>	
		<td>UTC Offset :</td>
		<td><?php echo $obj -> utc_offset; ?></td>
	</tr>
	<tr>	
		<td>Country Calling Code :</td>
		<td><?php echo $obj -> country_calling_code; ?></td>
	</tr>
	<tr>	
		<td>Currency :</td>
		<td><?php echo $obj -> currency; ?></td>
	</tr>
	
	<tr>	
		<td>Autonomous system number :</td>
		<td><?php echo $obj -> asn; ?></td>
	</tr>
	<tr>	
		<td>Organization Name :</td>
		<td><?php echo $obj -> org; ?></td>
	</tr>

</table>
</body>
</html>
