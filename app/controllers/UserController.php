<?php

class UserController extends Controller
{
    public function index()
    {

    }

    public function login()
    {
        if (isset($_POST['action'])) {
            $user = $this->model('User');
            $user = $user->find($_POST['username']);
            if($user && password_verify($_POST['password'], $user->password))
            {
                $_SESSION["user_id"] = $user->id;
                $_SESSION["user_type"] = $user->user_type;
                header('location:'.$GLOBALS['url_path'].'/index');
            } else {
                $this->view('user/login', ['error' => 'wrong credentials']);
            }

        } else {
            $this->view('user/login');
        }
    }

    public function signup()
    {
        if (isset($_POST['action'])) {
            $newUser = $this->model('User');
            $newUser->username = $_POST['username'];
            $newUser->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $newUser->user_type = $_POST['user_type'];
            $check = $newUser->create();
            if($check > 0) {
                $user = $newUser->find($_POST['username']);
                $_SESSION["user_id"] = $user->id;
                $_SESSION["user_type"] = $user->user_type;
                header('location:'.$GLOBALS['url_path'].'/index');
            } else {
                $this->view('user/signup', ['error' => 'Dupliacte Username']);
            }
        } else {
            $this->view('user/signup');
        }
    }
    
    public function logout()
    {
        if(isset($_SESSION['cart_products'])) {
            foreach ($_SESSION['cart_products'] as $product_id => $product_object) {
                $product = $this->model('Product')->find($product_id);
                $product->quantity += $_SESSION['cart_products'][$product_id]['quantity'];
                $product->update();
            }
        }
        if(isset($_SESSION["user_id"])){
            session_destroy();
        }
        
        header('location:'.$GLOBALS['url_path'].'/user/login');
    }

    public function account()
    {
        if(isset($_SESSION["user_id"])){
            $user = $this->model('User')->findById($_SESSION['user_id']);
            if($user->user_type == 'seller'){
                $shop_profile = $this->model('ShopProfile')->find($_SESSION['user_id']);
                if($shop_profile) {
                    if (isset($_POST['action'])) {
                        $shop_profile->shop_description = $_POST['shop_description'];
                        $shop_profile->shop_name = $_POST['shop_name'];
                        $shop_profile->shop_category = $_POST['shop_category'];
                        $check = $shop_profile->update();
                        if($check) {
                            header('location:'.$GLOBALS['url_path'].'/index');
                        } else {
                            $this->view('shop_profile/edit', ['shop_profile' => $shop_profile, 'error' => 'Error happens, Please reinput all your data fields']);
                        }
                    } else {
                        $this->view('shop_profile/edit', ['shop_profile' => $shop_profile]);
                    }
                } else {
                    if (isset($_POST['action'])) {
                        $shop_profile = $this->model('ShopProfile');
                        $shop_profile->seller_id = intVal($_SESSION['user_id']);
                        $shop_profile->shop_description = $_POST['shop_description'];
                        $shop_profile->shop_name = $_POST['shop_name'];
                        $shop_profile->shop_category = $_POST['shop_category'];
                        $check = $shop_profile->create();
                        if($check > 0) {
                            header('location:'.$GLOBALS['url_path'].'/index');
                        } else {
                            $this->view('shop_profile/create', ['error' => 'Error happens, Please reinput all your data fields']);
                        }
                    } else {
                        $this->view('shop_profile/create');
                    }
                }
            } else {
                $customer_profile = $this->model('CustomerProfile')->find($_SESSION['user_id']);
                if($customer_profile) {
                    if (isset($_POST['action'])) {
                        $customer_profile->first_name = $_POST['first_name'];
                        $customer_profile->last_name = $_POST['last_name'];
                        $customer_profile->email = $_POST['email'];
                        $customer_profile->phone = $_POST['phone'];
                        $check = $customer_profile->update();
                        if($check) {
                            header('location:'.$GLOBALS['url_path'].'/index');
                        } else {
                            $this->view('customer_profile/edit', ['customer_profile' => $customer_profile, 'error' => 'Duplicate email']);
                        }
                    } else {
                        $this->view('customer_profile/edit', ['customer_profile' => $customer_profile]);
                    }
                } else {
                    if (isset($_POST['action'])) {
                        $customer_profile = $this->model('CustomerProfile');
                        $customer_profile->customer_id = intVal($_SESSION['user_id']);
                        $customer_profile->first_name = $_POST['first_name'];
                        $customer_profile->last_name = $_POST['last_name'];
                        $customer_profile->email = $_POST['email'];
                        $customer_profile->phone = $_POST['phone'];
                        $check = $customer_profile->create();
                        if($check > 0) {
                            header('location:'.$GLOBALS['url_path'].'/index');
                        } else {
                            $checkEmailValidity = $this->model('CustomerProfile')->findByEmail($_POST['email']);
                            if($checkEmailValidity) {
                                $this->view('customer_profile/create', ['error' => 'Duplicate Email']);
                            } else {
                                $this->view('customer_profile/create', ['error' => 'Error happens, Please reinput all your data fields']);
                            }
                        }
                    } else {
                        $this->view('customer_profile/create');
                    }
                }
            }

        } else {
            header('location:'.$GLOBALS['url_path'].'/user/login');
        }
        
    }

    public function info($user_id)
    {
        $user = $this->model('User')->findById($user_id);
        if ($user) {
            $success = "";
            if(isset($_SESSION['success'])) {
                $success = $_SESSION['success'];
                unset($_SESSION['success']);
            }
            if($user->user_type == "seller") {
                $user = $this->model('ShopProfile')->find($user_id);
                if($user) {
                    $products = $this->model('Product')->getUserProducts($user_id);
                    return $this->view('shop_profile/info', ['user' => $user, 'success' => $success, 'products' => $products]);
                } else {
                    return header('location:'.$GLOBALS['url_path'].'/index');
                }
            } else {
                $user = $this->model('CustomerProfile')->find($user_id);
                if($user) {
                    return $this->view('customer_profile/info', ['user' => $user, 'success' => $success]);
                } else {
                    return header('location:'.$GLOBALS['url_path'].'/index');
                }
            }
        } else {
            header('location:'.$GLOBALS['url_path'].'/index');
        }
    }
}
