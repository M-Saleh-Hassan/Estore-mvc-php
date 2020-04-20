<?php

class HomeController extends Controller
{

	public function index()
	{
		$products = $this->model('Product')->getProducts(6, 'id');
		$this->view('home/index', ['products' => $products]);
	}

}
