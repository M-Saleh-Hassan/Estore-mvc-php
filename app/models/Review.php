<?php

class Review extends Model
{
    var $product_id;
    var $customer_id;
    var $rating;
    var $comment;
    var $created_at;

    public function create()
    {
        $SQL = 'INSERT INTO review (product_id, customer_id, rating, comment) VALUES (:product_id, :customer_id, :rating, :comment)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute([
            'product_id' => $this->product_id,
            'customer_id' => $this->customer_id,
            'rating' => $this->rating,
            'comment' => $this->comment
        ]);
        return $stmt->rowCount();
    }

    public function find($review_id)
    {
        $SQL = 'SELECT * FROM review WHERE id = :review_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['review_id' => $review_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Review');
        return $stmt->fetch();
    }

    public function getProductReviews($product_id)
    {
        $SQL = 'SELECT * FROM review WHERE product_id = :product_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id' => $product_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Review');
        return $stmt->fetchAll();
    }
}
