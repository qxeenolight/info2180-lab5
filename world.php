<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$output = "";

if ($_SERVER["REQUEST_METHOD"] == "GET"){
  if (isset($_GET['country']) && !empty($_GET['country']) && !isset($_GET['context']) ){
    $filteredCountry = ucwords(trim(filter_var($_GET["country"], FILTER_SANITIZE_STRING)));
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$filteredCountry%' ");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "<ul>";
    foreach($results as $country){
      $output .= "<li>".$country["name"]."<br>";
    }
    $output.= "</ul>";
  }

  else{
    $output = "<ul>";
    $stmt = $conn->query("SELECT * FROM countries ");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $country){
      $output .= "<li>".$country["name"]."<br>";
    }
    $output.= "</ul>";
  }

  echo $output;
}
?>