<?php
if(isset($_POST['recordData'])){
	
	$forecast = new Forecast;
	$result=$forecast->persistData();
	
		if ($result === false){
			
			$msg_error = 'Une erreur est survenue lors de l\'enregistement.';
			
		} elseif (is_string($result)){
			
			$msg_error = $result;
			
		} else {
			
			$msg_error = 'Enregistrement OK';
		}
}
