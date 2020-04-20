<?php

class OrderController extends Controller
{
    public function index()
    {   
        if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'seller') {
            $orders = $this->model('Order')->getSellerOrders($_SESSION['user_id']);
            return $this->view('order/index', ['orders' => $orders]);
        } else {
            header('location:'.$GLOBALS['url_path'].'/index');
        }
    }
    
}
