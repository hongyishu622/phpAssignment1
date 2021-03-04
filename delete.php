<?php
ob_start();

$tune_id = filter_input(INPUT_GET,'user_id');
try {
    //connect to db
    require('connect.php');

    //create a query
    $sql = "DELETE FROM video WHERE user_id = :tune_id;";

    //prepare that query
    $statement = $db->prepare($sql);

    //bind
    $statement->bindParam(':tune_id', $tune_id);

    //execute
    $statement->execute();

    //close connection
    $statement->closeCursor();
    header('location:view.php');
}
catch(PDOException $e) {
    header('location:error.php');
}

ob_flush();
?>
