<?php

$servername = "localhost"; // Replace with your server name if not localhost
$username = "zakaria";        // Replace with your MySQL username
$password = "nzizou123";            // Replace with your MySQL password
$database = "HOTEL_DB ";     // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

   function create_unique_id(){
      $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $rand = array();
      $length = strlen($str) - 1;

      for($i = 0; $i < 20; $i++){
         $n = mt_rand(0, $length);
         $rand[] = $str[$n];
      }
      return implode($rand);
   }

?>