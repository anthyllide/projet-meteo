<?php
$forecast = new Forecast;

$forecastData = $forecast->getData();

if (is_array($forecastData)){
	
	 $displayData = $forecastData;
	 
} else {
	
	$msg_error = $forecastData;
	
}