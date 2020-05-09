<?php

class StoreController extends Controller
{
    public function index()
    {   
        if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'buyer' && $this->model('CustomerProfile')->find($_SESSION['user_id']) == false) {
            header('location:'.$GLOBALS['url_path'].'/user/account');
        }
        if(isset($_GET['search'])) {
            $products = $this->model('Product')->getSearchedProducts($_GET['search']);
        } else {
            $products = $this->model('Product')->getProducts(12, 'id');
        }
        return $this->view('store/index', ['products' => $products]);
    }
    
    public function checkout()
    {
        if (isset($_POST['action'])) {

            $date_ordered = date('Y-m-d');
            $date_required = $_POST['date_required'];

            $order = $this->model('Order');
            $order->customer_id = intVal($_SESSION['user_id']);
            $order->date_ordered = $date_ordered;
            $order->date_required = $date_required;
            $order->status = 0;
            $order_id = $order->create();
            if($order_id != 0) {
                foreach ($_SESSION['cart_products'] as $product_id => $product_object) {
                    $product = $this->model('Product')->find($product_id);

                    $orderSeller = $this->model('OrderSeller');
                    $orderSeller->order_id = $order_id;
                    $orderSeller->seller_id = $product->seller_id;
                    $orderSeller->create();

                    $orderDetails = $this->model('OrderDetail');
                    $orderDetails->order_id = $order_id;
                    $orderDetails->product_id = $product_id;
                    $orderDetails->quantity = $_SESSION['cart_products'][$product_id]['quantity'];
                    $orderDetails->create();

                    unset($_SESSION['cart_products'][$product_id]);
                }
                return $this->view('cart/thanks');
            } else {
                $this->view('cart/checkout', ['error' => 'Error Happens. Try again']);
            }
        }

        return $this->view('cart/checkout');
    }

    
}
