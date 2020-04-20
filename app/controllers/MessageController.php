<?php

class MessageController extends Controller
{

    public function send($receiver_id)
    {
        $message = $this->model('Message');
        $message->seller_id = $_SESSION['user_id'];
        $message->customer_id = $receiver_id;
        $message->customer_email = $_POST['email'];
        $message->subject = $_POST['subject'];
        $message->message = $_POST['message'];
        $message->create();
        $_SESSION['success'] = 'Your message is sent successfully.';
        header('location:'.$GLOBALS['url_path'].'/user/info/'.$receiver_id);
    }
    
}
