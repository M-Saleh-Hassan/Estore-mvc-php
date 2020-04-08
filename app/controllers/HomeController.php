<?php

	class HomeController extends Controller{

		public function index(){	
			$this->view('home/index');
		}

		public function create(){
		    if(isset($_POST['action'])){
			    $newItem = $this->model('Item');
			    $newItem->name = $_POST['name'];
			    $newItem->create();
			    header('location:/Home/index');
		    }else{
			    $this->view('home/create');
		   	}
		}
	}
?>
