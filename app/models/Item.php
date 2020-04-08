<?php

//gets the data

class Item extends Model{
    var $name;

    //read all item

    public function get(){
      $SQL = 'SELECT * FROM ITEM';
      $stmt = self::$_connection->prepare($SQL);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
      return $stmt->fetchAll();
    }

    public function create(){
      $SQL = 'INSERT INTO Item(name) VALUES (:name)';
      $stmt = self::$_connection->prepare($SQL);
      $stmt->execute(['name'=>$this->name]);
      return $stmt->rowCount();
    }

    //read single item from list

    public function find($item_id){
      $SQL = 'SELECT * FROM Item WHERE item_id = :item_id';
      $stmt = self::$_connection->prepare($SQL);
      $stmt->execute(['item_id'=>$item_id]);
      $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
      return $stmt->fetch();
    }
}
