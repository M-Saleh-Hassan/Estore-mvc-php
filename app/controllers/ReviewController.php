<?php

class ReviewController extends Controller
{
    public function save($product_id)
    {
        $product = $this->model('Product')->find($product_id);
        if ($product) {
            if (isset($_POST['comment'])) {
                $review = $this->model('Review');
                $review->product_id = $product_id;
                $review->customer_id = $_SESSION['user_id'];
                $review->rating = $_POST['rating'];
                $review->comment = $_POST['comment'];
                $review->create();
                header('location:' . $GLOBALS['url_path'] . '/product/details/' . $product_id);
            } else {
                header('location:' . $GLOBALS['url_path'] . '/index');
            }
        } else {
            header('location:' . $GLOBALS['url_path'] . '/index');
        }
    }

    public function like($review_id)
    {
        $review = $this->model('Review')->find($review_id);
        if ($review) {
            $like = $this->model('ReviewLike');
            $like->review_id = $review_id;
            $like->user_id = $_SESSION['user_id'];
            $like->create();
            header('location:' . $GLOBALS['url_path'] . '/product/details/' . $review->product_id);
        } else {
            header('location:' . $GLOBALS['url_path'] . '/index');
        }
    }
}
