<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = htmlspecialchars($_GET['country']);
$cities = htmlspecialchars($_GET['lookup']);
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if (!empty($country) && $cities == 'cities'){
   $stmt = $conn->prepare("SELECT c.name,c.district,c.population FROM cities c join countries cs on c.country_code = cs.code WHERE cs.name LIKE :country");
   $country = "%$country%";
   $stmt->bindParam(":country",$country);
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
   echo '<table>';
   echo '<tr>';
   echo '<th> Name </th>';
   echo '<th> District </th>';
   echo '<th> Population </th>';
   echo '</tr>';
   foreach ($results as $row): 
    echo '<tr>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['district'].'</td>';
    echo '<td>'.$row['population'].'</td>';
    echo '</tr>';
   endforeach; 
   echo '</table>';
}
else if (empty($cities)){
   $stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
   $country = "%$country%";
   $stmt->bindParam(":country",$country);
   $stmt->execute();
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
   echo '<table>';
   echo '<tr>';
   echo '<th> Name </th>';
   echo '<th> Continent </th>';
   echo '<th> Independence </th>';
   echo '<th> Head of State </th>';
   echo '</tr>';
   foreach ($results as $row): 
    echo '<tr>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['continent'].'</td>';
    echo '<td>'.$row['independence_year'].'</td>';
    echo '<td>'.$row['head_of_state'].'</td>';
    echo '</tr>';
   endforeach; 
   echo '</table>';
}
else
   echo '<h3>No country entered</h3>';


?>
 
