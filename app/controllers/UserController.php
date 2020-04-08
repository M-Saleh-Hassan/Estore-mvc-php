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
                $_SESSION["username"] = $user->username;
                header('location:../index');
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
                $_SESSION["username"] = $newUser->username;
                header('location:../index');
            } else {
                $this->view('user/signup', ['error' => 'Dupliacte Username']);
            }
        } else {
            $this->view('user/signup');
        }
    }
    
    public function logout()
    {
        if(isset($_SESSION["username"])){
            unset($_SESSION["username"]);
        }
        
        header('location:../user/login');
    }
}
