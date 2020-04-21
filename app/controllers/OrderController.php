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

    public function cancel($order_id)
    {
        if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'seller') {
            $order = $this->model('Order')->find($order_id);
            if($order){
                $order_details = $order->getOrderDetails();
                $order_sellers = $order->getOrderSellers();

                foreach ($order_details as $order_detail) {
                    $product = $this->model('Product')->find($order_detail['product_id']);
                    $product->quantity += $order_detail['quantity'];
                    $product->update();
                    $this->model('OrderDetail')->delete($order_detail['id']);
                }

                foreach ($order_sellers as $order_seller) {
                    $this->model('OrderSeller')->delete($order_seller['id']);
                }

                $order->delete();
            }
            header('location:'.$GLOBALS['url_path'].'/order/index');
        } else {
            header('location:'.$GLOBALS['url_path'].'/index');
        }
    }
    
}
