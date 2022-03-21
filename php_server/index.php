<?php
    header("Content-Type:application/json");
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
   $mysqli = new mysqli('my_sql','root','root','docker_data');
   $myArray = array();
   if ($result = $mysqli->query("SELECT * FROM users")) {
   
       while($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $myArray[] = $row;
       }
       echo json_encode($myArray);
   }
    