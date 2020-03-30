<?php


$servername = "localhost";
$username = "root";
$password = "";



try {
    $pdo = new PDO("mysql:host=$servername;dbname=netland", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>


<table>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <h1>Welkom op het netland beheerderspaneel</h1>
  <table style="width:200px">
    <tr><th>Series</th>
    <th>Rating</th>
    <td style="text-align:center"></td></tr>
<?php

$series = $pdo->query('SELECT title,rating FROM series');
echo "<h1>Series</h1>";

while ($show = $series->fetch()) {
    echo "<tr><td>";
    echo $show['title'] . '</td>';
    echo "<td >" . $show['rating'] . "</td>";
    echo "</tr>";
}
 

?>

</table>



<table style="width:200px">
<tr><th>Movies</th>
    <th>Duur</th>
    <td style="text-align:center"></td></tr>

        <?php


            $movies = $pdo->query('SELECT title,duur FROM movies');
            echo "<h1>Movies</h1>";
        while ($show = $movies->fetch()){
                echo "<tr>";
                echo "<td>" . $show['title'] . '</td>';
                echo '<td>' . $show['duur']; "</td>";
                echo "</tr>";
            }
        ?>




</table>
</body>

</html>