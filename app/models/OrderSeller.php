<?php


class OrderSeller extends Model
{
    var $order_id;
    var $seller_id;

    public function create()
    {
        $SQL = 'INSERT INTO order_sellers (order_id, seller_id) VALUES (:order_id, :seller_id)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute([
            'order_id' => $this->order_id,
            'seller_id' => $this->seller_id
        ]);
        return $stmt->rowCount();
    }

    public function getOrderSellers($order_id)
    {
        $SQL = 'SELECT seller_id FROM order_sellers WHERE order_id = :order_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['order_id' => $order_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'OrderSeller');
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $SQL = 'DELETE FROM order_sellers WHERE id = :id';
        $stmt = self::$_connection->prepare($SQL);
        return $stmt->execute(['id' => $id]);
    }
}
