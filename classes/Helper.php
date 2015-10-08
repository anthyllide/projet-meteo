<?php
class Helper 
{
	function msgError() {
		
		if(isset($msg_error_report)){ 
					
				return $msg_error_report ; 
		
		} 
	
		if (isset($msg_error_read)){
		
			return $msg_error_read;
		
		} 
		
		if (isset($msg_error_record)){
			
			return $msg_error_record ;
		
		} 
	}
}