<?php


class Product extends Model
{
  var $seller_id;
  var $name;
  var $price;
  var $quantity;
  var $category;
  var $image;
  var $description;
  var $has_promotion;
  var $expiry_date;
  var $new_price;

  public function create()
  {
    $SQL = 'INSERT INTO product (seller_id, name, description, price, quantity, category, image) VALUES (:seller_id, :name, :description, :price, :quantity, :category, :image)';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute([
      'seller_id' => $this->seller_id,
      'name' => $this->name,
      'description' => $this->description,
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
      description = :description,
      price = :price,
      quantity = :quantity,
      category = :category,
      image = :image
      WHERE id = :id
    ';
    $stmt = self::$_connection->prepare($SQL);
    $execute = $stmt->execute([
      'name' => $this->name,
      'description' => $this->description,
      'price' => $this->price,
      'quantity' => $this->quantity,
      'category' => $this->category,
      'image' => $this->image,
      'id' => $this->id
    ]);
    return $execute;
  }

  public function updatePromotion()
  {
    $SQL = 'UPDATE product SET
      has_promotion = :has_promotion,
      new_price = :new_price,
      expiry_date = :expiry_date
      WHERE id = :id
    ';
    $stmt = self::$_connection->prepare($SQL);
    $execute = $stmt->execute([
      'has_promotion' => $this->has_promotion,
      'new_price' => $this->new_price,
      'expiry_date' => $this->expiry_date,
      'id' => $this->id
    ]);
    return $execute;
  }

  public function delete($product_id)
  {
    $SQL = 'DELETE FROM product WHERE id = :product_id';
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

  public function getProducts($limit, $orderBy)
  {
    $SQL = 'SELECT * FROM product order by ' . $orderBy . ' desc limit ' . $limit;
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
    return $stmt->fetchAll();
  }

  public function getRate()
  {
    $SQL = 'SELECT AVG(rating) as rate FROM review where product_id = :product_id';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute(['product_id' => $this->id]);
    return round($stmt->fetch()['rate']);
  }

  public function getSearchedProducts($search)
  {
    $SQL = 'SELECT * FROM product WHERE name  LIKE :search';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute(['search' => '%' . $search . '%']);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
    return $stmt->fetchAll();
  }
}
