<?php

$con = new mysqli('localhost', 'root', '', 'mydb2');

if ($con) {
  echo "Connected Sucessful";
} else {
  die(mysqli_error($con));
}
