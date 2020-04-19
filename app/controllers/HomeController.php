<?php

class HomeController extends Controller
{

	public function index()
	{
		$products = $this->model('Product')->getProducts(6, 'id');
		$this->view('home/index', ['products' => $products]);
	}

	public function create()
	{
		if (isset($_POST['action'])) {
			$newItem = $this->model('Item');
			$newItem->name = $_POST['name'];
			$newItem->create();
			header('location:/Home/index');
		} else {
			$this->view('home/create');
		}
	}
}
