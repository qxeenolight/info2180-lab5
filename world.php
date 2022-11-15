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
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
    <table>
        <tr> 
            <th>Name</th>
            <th>Continent</th>
            <th>Independence</th>
            <th>Head of State</th>
        </tr>
        <tbody> 
            <?php foreach ($results as $country): ?>
              <tr> 
                  <td><?= $country['name']?></td>
                  <td><?= $country['continent']?></td>
                  <td><?= $country['independence_year']?></td>
                  <td><?= $country['head_of_state']?></td>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table> <?php  
  }

  else{
    $output = "<ul>";
    $stmt = $conn->query("SELECT * FROM countries ");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
    <table>
        <tr> 
            <th>Name</th>
            <th>Continent</th>
            <th>Independence</th>
            <th>Head of State</th>
        </tr>
        <tbody> 
            <?php foreach ($results as $country): ?>
              <tr> 
                  <td><?= $country['name']?></td>
                  <td><?= $country['continent']?></td>
                  <td><?= $country['independence_year']?></td>
                  <td><?= $country['head_of_state']?></td>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table> <?php 
  }
}
?>