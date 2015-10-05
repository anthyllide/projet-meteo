<?php
require_once('config.php');
require_once('classes/Forecast.php');
require('classes/Helper.php');
require ('record-controller.php');
require ('getdata-controller.php');
?>

<!DOCTYPE html>
<html lang='fr'>

<head>
<meta charset='UTF-8'/>
<title><?php echo WEB_TITLE;?></title>
<link rel="stylesheet" href="css/style.css" media="screen" />
<link href='https://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'>
</head>

<body>

<div id="wrapper">

<h1>Bulletin météo</h1>

<form action="" method='post'>

	<input type="submit" name="recordData" value="Enregistrer le nouveau flux"/>
	
</form>

<?php if (isset ($msg_error)) : ?>

<div id="msg_error">

	<p><?php echo $msg_error; ?></p>
	
</div>

<?php endif ?>



<div id="contenu">

<!-- Affichage des données -->
<?php if (isset($displayData)): ?>
	
	 <?php foreach($displayData as $id => $value): ?>
	 
		<table>
		<caption>Bulletin du <?php echo $value['date'].' '.$value['period'].' à '.$value['city']; ?></caption>
		<tbody>
		<tr>
			<th>Résumé</th>
			<td> <?php echo $value['resume'];?></td>
		</tr>
		<tr>
			<th>Identifiant</th>
			<td><?php echo $value['idWeather'];?></td>
		</tr>
		<tr>
			<th>Température minimale</th>
			<td><?php echo $value['tptMin'].' °C';?></td>
		</tr>
		<tr>
			<th>Température maximale </th>
			<td><?php echo $value['tptMax'].' °C';?></td>
		</tr>
		<tr>
			<th>Commentaire</th>
			<td><?php echo $value['comment'];?></td>
		</tr>
		</tbody>
		</table>
		
	 <?php endforeach ?>
	 
<?php endif ?>


</div>

</div>

</body>

</html>