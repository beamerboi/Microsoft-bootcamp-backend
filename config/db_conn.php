<?php

$conn = mysqli_connect("localhost", "test", "test123", "microsoft");


if(!$conn){
  echo 'Connection Error: '. mysqli_connect_error();
}
 ?>
