<?php

class Message extends Model
{
    var $seller_id;
    var $customer_id;
    var $customer_email;
    var $subject;
    var $message;
    var $created_at;

    public function create()
    {
        $SQL = 'INSERT INTO message (seller_id, customer_id, customer_email, subject, message) VALUES (:seller_id, :customer_id, :customer_email, :subject, :message)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute([
            'seller_id' => $this->seller_id,
            'customer_id' => $this->customer_id,
            'customer_email' => $this->customer_email,
            'subject' => $this->subject,
            'message' => $this->message
        ]);
        return $stmt->rowCount();
    }

    public function find($message_id)
    {
        $SQL = 'SELECT * FROM message WHERE id = :message_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['message_id' => $message_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        return $stmt->fetch();
    }
}
