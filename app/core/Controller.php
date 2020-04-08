<?php
class Controller{
	
	public function model($model){
		if(file_exists('app/models/' . $model. '.php')){  //if  the file exist
			require_Once 'app/models/' .  $model . '.php'; //include the file from the models folder
			return new $model();                           //erturn new object of the class
		}else{
			return null;
		}
	}

	public function view($name, $data =[]){
		if(file_exists('app/views/' . $name. '.php')){  //if  the file exist
			include 'app/views/' .  $name . '.php'; //include the file from the views folder. $data will contain data in this view
			
		}else{
			return "ERROR: the view $name does not exist! ";
		}

	}
}

?>