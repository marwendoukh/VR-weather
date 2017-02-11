<!-- Created by Marwen Doukh - Mozilla Tunisia -->
<html lang="en">

	<head>
		<meta charset="utf-8">

		<title>Workshop webVR</title>

		<meta name="description" content="VR weather">
		<meta name="author" content="Marwen Doukh">

<!--get the Aframe library-->
<script src="https://aframe.io/releases/0.5.0/aframe.min.js"></script>

	</head>
	<body>

<?php
///////////////////////////////// weather ////////////////////////////////////////////////

/// get the response from the weather web service/////////
	$response = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=ariana,tn&appid=2156e2dd5b92590ab69c0ae1b2d24586&units=metric');

	//// transform the web service response to a JSON object

	$weatherObject = json_decode($response);


	?>
	<a-scene>
<!--print the weather in a Aframe text -->
		<a-entity  text="width: 20; value:<?php echo $weatherObject->name?> \n \n <?php echo $weatherObject->main->temp?> °C \n \n <?php echo $weatherObject->weather[0]->description?>"></a-entity>


<?php
// change the sky ("background") according to the weather's conditions

if($weatherObject->weather[0]->main=="Clouds")
{

	echo"	<a-sky color=\"#424242\"></a-sky>";
}
	else if($weatherObject->weather[0]->main=="Rain")
	{
		echo"	<a-sky color=\"#039be5\"></a-sky>";

	}
	else if($weatherObject->weather[0]->main=="Snow")
	{
		echo"	<a-sky color=\"#e0e0e0\"></a-sky>";

	}

?>

<a-entity position="-8 -2 3.8">
<a-camera></a-camera>
</a-entity>
</a-scene>

</body>
</html>
