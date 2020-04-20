<?php


class OrderDetail extends Model
{
    var $order_id;
    var $product_id;
    var $quantity;

    public function create()
    {
        $SQL = 'INSERT INTO order_details (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute([
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity
        ]);
        return $stmt->rowCount();
    }

    public function getOrderDetails($order_id)
    {
        $SQL = 'SELECT * FROM order_details WHERE order_id = :order_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['order_id' => $order_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'OrderDetail');
        return $stmt->fetch();
    }

    public function getProductOrderDetails($product_id)
    {
        $SQL = 'SELECT sum(quantity)  as  quantity FROM order_details where product_id = :product_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id' => $product_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'OrderDetail');
        return $stmt->fetch();
    }
}
