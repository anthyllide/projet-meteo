<?php
class Forecast 
{
	public function __construct(){
		
	}
	
	//lecture du flux
	public function getFileCsv() {
		
		$filename = 'flux-meteo.csv';
		$i=0;
		
		if (file_exists($filename)){
		
			if(($handle = fopen($filename,"r")) !== false){
			
				while(($result = fgetcsv($handle,1000,';')) !== false){
			
					$data[$i]=$result;
					$i++;
				}
									
		}
		
		fclose($handle);
		return $data;
		
		}
		
		return false;
		
	}
	
	//Enregistrement des données dans la table 
	public function persistData(){
		
		try {
			
			$bdd = new PDO('mysql:host=localhost; dbname=meteo', 'root', '');
			$bdd->exec("SET NAMES 'UTF8'");
			
		} catch (Exception $e) {
			
			throw ('Erreur : '. $e -> getMessage());
		}
		
		
		if(($data = $this->getFileCsv()) !== false){
		

			foreach($data as $key => $value){
				
				$date=$value[0];
				$city=$value[1];
				$period=$value[2];
				$resume=$value[3];
				$idWeather=$value[4];
				$tptMin=$value[5];
				$tptMax=$value[6];
				$comment=$value[7];
		
				$rep = $bdd->prepare('
				INSERT INTO forecast
				(date, city, period, resume, idWeather, tptMin, tptMax, comment) 
				VALUES (:date, :city, :period, :resume, :idWeather, :tptMin, :tptMax, :comment)');
	
				$dataInsert = $rep->execute(array(
	
					'date'=>$date,
					'city'=>$city,
					'period'=>$period,
					'resume'=>$resume,
					'idWeather'=>$idWeather,
					'tptMin'=>$tptMin,
					'tptMax'=>$tptMax,
					'comment'=>$comment
					));	
					
					
				if($dataInsert === false){
					
							return false;
				}								
			}
			
			$rep->closeCursor();
			
		} else {
			
			return 'Lecture impossible du fichier de flux';

		}
	}
	
	//Lecture des données de la table 
	public function getData(){
		
		try {
			
			$bdd = new PDO('mysql:host=localhost; dbname=meteo', 'root', '');
			$bdd->exec("SET NAMES 'UTF8'");
			
		} catch (Exception $e) {
			
			throw ('Erreur : '. $e -> getMessage());
		}
		
		$dataRead = $bdd->query('SELECT DATE_FORMAT(date,"%d-%m-%Y") AS date, city, period, resume, idWeather, tptMin, tptMax, comment FROM forecast WHERE date > "2015-08-10" LIMIT 6');
		
		$numberRow = $dataRead->rowCount();
		
			if($numberRow > 0){

				$i=1;
				while ($display = $dataRead -> fetch()){
		
					$forecast [$i]['date'] = $display['date'];
					$forecast [$i]['city'] = $display['city'];
					$forecast [$i]['period'] = $display['period'];
					$forecast [$i]['resume'] = $display['resume'];
					$forecast [$i]['idWeather'] = $display['idWeather'];
					$forecast [$i]['tptMin'] = $display['tptMin'];
					$forecast [$i]['tptMax'] = $display['tptMax'];
					$forecast [$i]['comment'] = $display['comment'];
		
					$i++;
				}
				
				$dataRead->closeCursor();
				
				return $forecast;
				
			} else {
				
				return 'Pas de données';
	
			}
	}
	
}
