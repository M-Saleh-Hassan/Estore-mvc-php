<?php

class ProductController extends Controller
{
    public function index()
    {   
        if(isset($_SESSION['user_id'])) {
            $products = $this->model('Product')->getUserProducts($_SESSION['user_id']);
            $this->view('product/index', ['products' => $products]);
        } else {
            header('location:'.$GLOBALS['url_path'].'/user/login');
        }
    }

    public function edit($product_id)
    {
        $product = $this->model('Product')->find($product_id);
        if($product) {
            if (isset($_POST['action'])) {
                $product->name = $_POST['name'];
                $product->description = $_POST['description'];
                $product->price = $_POST['price'];
                $product->quantity = $_POST['quantity'];
                $product->category = $_POST['category'];
                if(!empty($_FILES["image"]["name"])) {
                    $image_file = $_FILES["image"]["name"];
                    $type = $_FILES["image"]["type"];
                    $temp = $_FILES["image"]["tmp_name"];
                    
                    $path = "app/public/uploads/".$image_file;
                    if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif')
                    { 
                        move_uploaded_file($temp, $path);
                    }
                    else {
                        return $this->view('product/edit', ['product' => $product, 'error' => 'Please choose valid image']);
                    }
                    $product->image = $path;
                }

                $check = $product->update();
                if($check) {
                    header('location:'.$GLOBALS['url_path'].'/product/index');
                } else {
                    $this->view('product/edit', ['product' => $product, 'error' => 'Error happens, Please reinput all your data fields']);
                }


            } else {
                $this->view('product/edit', ['product' => $product]);
            }
        } else {
            header('location:'.$GLOBALS['url_path'].'/index');
        }
    }

    public function create()
    {
        if (isset($_POST['action'])) {

            $product = $this->model('Product');
            $product->seller_id = intVal($_SESSION['user_id']);
            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->price = $_POST['price'];
            $product->quantity = $_POST['quantity'];
            $product->category = $_POST['category'];

            $image_file = $_FILES["image"]["name"];
            $type = $_FILES["image"]["type"];
            $temp = $_FILES["image"]["tmp_name"];
            
            $path = "app/public/uploads/".$image_file;
            if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif')
            { 
                move_uploaded_file($temp, $path);
            }
            else {
                $this->view('product/create', ['error' => 'Please choose valid image']);
            }
            $product->image = $path;
            $check = $product->create();

            if($check > 0) {
                header('location:'.$GLOBALS['url_path'].'/product/index');
            } else {
                $this->view('product/create', ['error' => 'Error in data']);
            }
        } else {
            $this->view('product/create');
        }
    }
    
    public function delete($product_id)
    {
        $product = $this->model('Product')->delete($product_id);
        header('location:'.$GLOBALS['url_path'].'/product/index');        
    }

    public function details($product_id)
    {
        $product = $this->model('Product')->find($product_id);
        if($product) {
            if (isset($_POST['quantity']) && isset($_SESSION['user_id'])) {
                if($_POST['quantity'] > $product->quantity) {
                    $_POST['quantity'] = $product->quantity;
                }
                $cart['id'] = $product_id;
                $cart['name'] = $product->name;
                $cart['image'] = $product->image;
                if ($product->has_promotion && $product->expiry_date > date("Y-m-d")) {
                    $cart['price'] = $product->new_price;
                } else {
                    $cart['price'] = $product->price;
                }
                $cart['quantity'] = $_POST['quantity'];
                if(isset($_SESSION['cart_products'][$product_id])) {
                    $cart['quantity'] += $_SESSION['cart_products'][$product_id]['quantity'];
                }
                $_SESSION['cart_products'][$product_id] = $cart;

                $product->quantity = $product->quantity - $_POST['quantity'];
                $product->update();

                header('location:'.$GLOBALS['url_path'].'/index');
            } else {
                if(isset($_SESSION['user_id'])) {
                    $ordered_before = $this->model('Order')->hasOrderedProductBefore($_SESSION['user_id'], $product_id);
                } else {
                    $ordered_before = 0;
                }
                $reviews = $this->model('Review')->getProductReviews($product_id);
                $shop_profile = $this->model('ShopProfile')->find($product->seller_id);
                return $this->view('product/details', [
                    'product' => $product,
                    'ordered_before' => $ordered_before,
                    'reviews' => $reviews,
                    'shop_profile' => $shop_profile
                ]);
            }
        } else {
            header('location:'.$GLOBALS['url_path'].'/index');
        }
    }

    public function report($product_id)
    {
        $product = $this->model('Product')->find($product_id);
        if($product) {
            $order_sales_count = $this->model('OrderDetail')->getProductOrderDetails($product_id);
            if(is_null($order_sales_count->quantity)) {
                $order_sales_count = 0;
            } else {
                $order_sales_count = $order_sales_count->quantity;
            }
            return $this->view('product/report', ['order_sales_count' => $order_sales_count]);
        } else {
            header('location:'.$GLOBALS['url_path'].'/index');
        }
    }

    public function promotion($product_id)
    {
        $product = $this->model('Product')->find($product_id);
        if($product) {
            if (isset($_POST['action'])) {
                $product->has_promotion = intVal(isset($_POST['has_promotion']));
                $product->new_price = $_POST['new_price'];
                $product->expiry_date = $_POST['expiry_date'];
                $check = $product->updatePromotion();
                if($check) {
                    header('location:'.$GLOBALS['url_path'].'/product/index');
                } else {
                    $this->view('product/promotion', ['product' => $product, 'error' => 'Error happens, Please reinput all your data fields']);
                }
            } else {
                $this->view('product/promotion', ['product' => $product]);
            }
        } else {
            header('location:'.$GLOBALS['url_path'].'/index');
        }
    }
}
