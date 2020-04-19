<?php


//model connected to the database
class Model{
  protected static $_connection = null;
  public function __construct(){
    if(self::$_connection == null){
      $user = 'root';
      $password = '';
      $host = 'localhost';
      $DBName = 'test';
      self::$_connection =  new PDO("mysql:host=$host;dbname=$DBName", $user, $password);
      self::$_connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    }
  }
}

?>