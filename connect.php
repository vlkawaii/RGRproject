<?php
$user = "root";
$password = "";

try {
  $db = new PDO("mysql:host=localhost;dbname=Ne_Netflix", $user, $password);
  $db->exec("set names utf8");
} catch (Exception $e) {
 echo $e->getMessage();
}
