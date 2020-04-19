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
            if (isset($_POST['quantity'])) {
                if($_POST['quantity'] > $product->quantity) {
                    $_POST['quantity'] = $product->quantity;
                }
                $cart['id'] = $product_id;
                $cart['name'] = $product->name;
                $cart['image'] = $product->image;
                $cart['price'] = $product->price;
                $cart['quantity'] = $_POST['quantity'];
                if(isset($_SESSION['cart_products'][$product_id])) {
                    $cart['quantity'] += $_SESSION['cart_products'][$product_id]['quantity'];
                }
                $_SESSION['cart_products'][$product_id] = $cart;

                $product->quantity = $product->quantity - $_POST['quantity'];
                $product->update();

                header('location:'.$GLOBALS['url_path'].'/index');
            } else {
                return $this->view('product/details', ['product' => $product]);
            }
        } else {
            header('location:'.$GLOBALS['url_path'].'/index');
        }
    }
}
