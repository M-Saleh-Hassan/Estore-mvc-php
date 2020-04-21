<?php


class ReviewLike extends Model
{
    var $review_id;
    var $user_id;

    public function create()
    {
        $SQL = 'INSERT INTO review_likes (review_id, user_id) VALUES (:review_id, :user_id)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute([
            'review_id' => $this->review_id,
            'user_id' => $this->user_id
        ]);
        return $stmt->rowCount();
    }

    public function getReviewLikes($review_id)
    {
        $SQL = 'SELECT Count(id) as likes FROM review_likes WHERE review_id = :review_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['review_id' => $review_id]);
        return $stmt->fetch()['likes'];
       
    }
}
