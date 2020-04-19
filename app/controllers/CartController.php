<?php

class CartController extends Controller
{

    public function index()
    {
        if(isset($_SESSION['cart_products'])) {
            $cart_products = $_SESSION['cart_products'];
        } else {
            $cart_products = [];
        }
        $this->view('cart/index', ['cart_products' => $cart_products]);
    }

    public function update()
    {
        foreach ($_SESSION['cart_products'] as $product_id => $product_object) {
            $product = $this->model('Product')->find($product_id);
            $new_quantity = $_POST['product_'.$product_id];
            if($new_quantity > $product->quantity + $_SESSION['cart_products'][$product_id]['quantity'] ) {
                $new_quantity = $product->quantity + $_SESSION['cart_products'][$product_id]['quantity'];
            }
            $product->quantity += $_SESSION['cart_products'][$product_id]['quantity'] - $new_quantity;
            $product->update();
            $_SESSION['cart_products'][$product_id]['quantity'] = $new_quantity;
        }
        header('location:'.$GLOBALS['url_path'].'/cart/index');
    }

    public function delete($product_id)
    {
        $product = $this->model('Product')->find($product_id);
        if($product) {
            $product->quantity += $_SESSION['cart_products'][$product_id]['quantity'];
            $product->update();
            unset($_SESSION['cart_products'][$product_id]);
        }
        header('location:'.$GLOBALS['url_path'].'/cart/index');
    }

    
}
