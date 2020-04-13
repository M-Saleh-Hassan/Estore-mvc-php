<?php


class CustomerProfile  extends Model
{
  var $customer_id;
  var $first_name;
  var $last_name;
  var $email;
  var $phone;

  public function create()
  {
    $SQL = 'INSERT INTO customer_profile (customer_id, first_name, last_name, email, phone) VALUES (:customer_id, :first_name, :last_name, :email, :phone)';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute([
      'customer_id' => $this->customer_id,
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'email' => $this->email,
      'phone' => $this->phone
    ]);
    return $stmt->rowCount();
  }

  public function find($customer_id)
  {
    $SQL = 'SELECT * FROM customer_profile WHERE customer_id = :customer_id';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute(['customer_id' => $customer_id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'CustomerProfile');
    return $stmt->fetch();
  }

  public function findByEmail($email)
  {
    $SQL = 'SELECT * FROM customer_profile WHERE email = :email';
    $stmt = self::$_connection->prepare($SQL);
    $stmt->execute(['email' => $email]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'CustomerProfile');
    return $stmt->fetch();
  }

  public function update()
  {
    $SQL = 'UPDATE customer_profile SET
        first_name = :first_name,
        last_name = :last_name,
        email = :email,
        phone = :phone
        WHERE customer_id = :customer_id
        ';
    $stmt = self::$_connection->prepare($SQL);
    $execute = $stmt->execute([
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'email' => $this->email,
      'phone' => $this->phone,
      'customer_id' => $this->customer_id
    ]);
    return $execute;
  }
}
