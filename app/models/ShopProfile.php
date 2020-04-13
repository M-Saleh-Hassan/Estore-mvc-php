<?php


class ShopProfile extends Model
{
  var $seller_id;
  var $shop_description;
  var $shop_name;
  var $shop_category;

  public function create()
  {
    $SQL = 'INSERT INTO shop_profile (seller_id, shop_description, shop_name, shop_category) VALUES (:seller_id, :shop_description, :shop_name, :shop_category)';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute([
      'seller_id' => $this->seller_id,
      'shop_description' => $this->shop_description,
      'shop_name' => $this->shop_name,
      'shop_category' => $this->shop_category
    ]);
    return $stmt->rowCount();
  }

  public function find($seller_id)
  {
    $SQL = 'SELECT * FROM shop_profile WHERE seller_id = :seller_id';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute(['seller_id' => $seller_id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'ShopProfile');
    return $stmt->fetch();
  }
  
  public function update()
  {
    $SQL = 'UPDATE shop_profile SET
        shop_description = :shop_description,
        shop_name = :shop_name,
        shop_category = :shop_category
        WHERE seller_id = :seller_id
        ';
    $stmt = self::$_connection->prepare($SQL);
    $execute = $stmt->execute([
        'shop_description' => $this->shop_description,
        'shop_name' => $this->shop_name,
        'shop_category' => $this->shop_category,
        'seller_id' => $this->seller_id
      ]);
    return $execute;
  }
}
