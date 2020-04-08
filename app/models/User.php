<?php

//gets the data

class User extends Model{
    var $username;
    var $password;
    var $user_type;

    //read all item

    public function get(){
      $SQL = 'SELECT * FROM user';
      $stmt = self::$_connection->prepare($SQL);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
      return $stmt->fetchAll();
    }

    public function create(){
      $SQL = 'INSERT INTO user(username, password, user_type) VALUES (:username, :password, :user_type)';
      $stmt = self::$_connection->prepare($SQL);
      $stmt->execute([
          'username'=>$this->username,
          'password'=>$this->password,
          'user_type'=>$this->user_type
          ]);
      return $stmt->rowCount();
    }

    //read single item from list

    public function find($username){
      $SQL = 'SELECT * FROM user WHERE username = :username';
      $stmt = self::$_connection->prepare($SQL);
      $stmt->execute(['username'=>$username]);
      $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
      return $stmt->fetch();
    }
}
