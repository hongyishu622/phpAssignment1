<?php
ob_start();
require('header.php');

//create variables to store info

$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$gender = filter_input(INPUT_POST, 'gender');
$age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
$platform = filter_input(INPUT_POST, 'platform');
$game_type = filter_input(INPUT_POST, 'game_type');
$game_name = filter_input(INPUT_POST, 'game_name');
//intiailize id
$id = null;
$id = filter_input(INPUT_POST, 'user_id');


//set up a flag variable for debugging
$ok = true;

//some form validation

if($age === false) {
    echo "<p> Please use a numeric value for age </p>";
    $ok = false;
}

if($ok === true) {
    try {
        //connect to db
        require('connect.php');

        //set up SQL query

        if(!empty($id)) {
            $sql = "UPDATE videogame SET first_name = :first_name, last_name = :last_name, gender = :gender, age = :age, platform = :platform,
                     game_type = :game_type, game_name = :game_name where user_id = :user_id;";

        }
        else {
            $sql = "INSERT into videogame (first_name, last_name, gender, age, platform, game_type, game_name) 
VALUES (:firs_tname, :flas_tname, :gender, :age, :game_type, :game_name);";
        }


        //call the prepare method of the PDO object

        $statement = $db->prepare($sql);

        //bind parameters using the bindParam method of the PDO Statement Object
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':gender', $gender);
        $statement->bindParam(':age', $age);
        $statement->bindParam(':platform', $platform);
        $statement->bindParam(':game_type', $game_type);
        $statement->bindParam(':game_name',$game_name);

        //bind $id if updating
        if(!empty($id)) {
            $statement->bindParam(':user_id', $id);
        }

        //execute the query
        $statement->execute();

        //echo '<p> Success, your tune has been added!</p> ';
        //close DB connection
        $statement->closeCursor();
        header('location:view.php');


    }
    catch(PDOException $e) {
        header('location:error.php');
    }
}
require('footer.php');
ob_flush();
?>


