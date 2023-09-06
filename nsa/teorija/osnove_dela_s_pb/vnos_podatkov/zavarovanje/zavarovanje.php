<!DOCTYPE html>

<?php
$servername = 'localhost';
$user = 'root';

$conn = new mysqli($servername, $username);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connection successful";


?>