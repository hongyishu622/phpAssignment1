<?php require('header.php'); ?>
<?php

//connect to database
require('connect.php');

//set up our query
$sql = "SELECT * FROM videogame";

//prepare the query

$statement = $db->prepare($sql);

//execute the query
$statement->execute();

// to store the results
$records = $statement->fetchAll();

//echo out top of table

echo "<table class='table table-striped'><tbody>";

foreach($records as $record) {
    echo"<tr><td>". $record['first_name'].
        "</td><td>" . $record['last_name'] .
        "</td><td>" . $record['gender'] .
        "</td><td>" . $record['age'] .
        "</td><td>" . $record['platform'] .
        "</td><td>" . $record['game_type'].
        "</td><td>" . $record['game_name'].
        "</td><td><a href='delete.php?id=" . $record['user_id']. "'> 
Delete Tune </a></td><td><a href='index.php?id=" . $record['user_id']. "'>Edit Tune </a></td></tr>";
}

echo "</tbody></table>";

//close the DB connection
$statement->closeCursor();

?>
<?php require('footer.php'); ?>