<?php


class Order extends Model
{
    var $customer_id;
    var $date_ordered;
    var $date_required;
    var $status;

    public function create()
    {
        $SQL = 'INSERT INTO orders (customer_id, date_ordered, date_required, status) VALUES (:customer_id, :date_ordered, :date_required, :status)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute([
            'customer_id' => 9,
            'date_ordered' => $this->date_ordered,
            'date_required' => $this->date_required,
            'status' => $this->status
        ]);
        if($stmt->rowCount()) {
            return self::$_connection->lastInsertId();
        } else {
            return 0;
        }
    }

    public function find($order_id)
    {
        $SQL = 'SELECT * FROM order WHERE id = :order_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['order_id' => $order_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
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

    public function getSellerOrders($seller_id)
    { 
        $SQL = '
            SELECT orders.*, order_sellers.seller_id
            FROM `orders`
            INNER JOIN order_sellers on order_sellers.order_id = orders.id
            GROUP BY orders.id
            HAVING order_sellers.seller_id = :seller_id
        ';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['seller_id' => $seller_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
        return $stmt->fetchAll();
    }
    
}
