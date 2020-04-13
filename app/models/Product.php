<?php


class Product extends Model
{
  var $seller_id;
  var $name;
  var $price;
  var $quantity;
  var $category;
  var $image;

  public function create()
  {
    $SQL = 'INSERT INTO product (seller_id, name, price, quantity, category, image) VALUES (:seller_id, :name, :price, :quantity, :category, :image)';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute([
      'seller_id' => $this->seller_id,
      'name' => $this->name,
      'price' => $this->price,
      'quantity' => $this->quantity,
      'category' => $this->category,
      'image' => $this->image
    ]);
    return $stmt->rowCount();
  }

  public function find($product_id)
  {
    $SQL = 'SELECT * FROM product WHERE id = :product_id';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute(['product_id' => $product_id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
    return $stmt->fetch();
  }

  public function update()
  {
    $SQL = 'UPDATE product SET
        name = :name,
        price = :price,
        quantity = :quantity,
        category = :category,
        image = :image
        WHERE id = :id
        ';
    $stmt = self::$_connection->prepare($SQL);
    $execute = $stmt->execute([
      'name' => $this->name,
      'price' => $this->price,
      'quantity' => $this->quantity,
      'category' => $this->category,
      'image' => $this->image,
      'id' => $this->id
    ]);
    return $execute;
  }

  public function delete($product_id)
  {
    $SQL = 'DELETE FROM product 
        WHERE id = :product_id
        ';
    $stmt = self::$_connection->prepare($SQL);
    $execute = $stmt->execute([
      'product_id' => $product_id
    ]);
    return $execute;
  }

  public function getUserProducts($seller_id)
  {
    $SQL = 'SELECT * FROM product WHERE seller_id = :seller_id';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute(['seller_id' => $seller_id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
    return $stmt->fetchAll();    
  }
}
