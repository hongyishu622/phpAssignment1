<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite video game</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300&family=Imbue:wght@300&display=swap" rel="stylesheet">
    <link href="css.css" rel="stylesheet">
</head>
<?php
$id = null;
$first_name = null;
$last_name = null;
$gender = null;
$age = null;
$platform = null;
$game_type = null;
$game_name = null;

if(!empty($_GET['id']) && (is_numeric($_GET['id']))) {
    $id = filter_input(INPUT_GET, 'id');
    //connect to the db
    require('connect.php');
    //set up query
    $sql = "SELECT * FROM videogame WHERE user_id = :user_id;";
    // prepare
    $statement = $db->prepare($sql);
    //bind
    $statement->bindParam(':user_id', $id);
    //execute
    $statement->execute();

    $records = $statement->fetchAll();

    foreach($records as $record) :
     $firs_name = $record['first_name'];
     $last_name = $record['last_name'];
     $gender = $record['gender'];
     $age= $record['age'];
     $game_type = $record['game_type'];
     $game_name = $record['game_name'];
     $platform = $record['platform'];
    endforeach;
    //close DB connection
    $statement->closeCursor();

    }
?>



<main>
        <div class="container">
            <div class="center-block">
                <header>
                    <h1> Game survey </h1>
                </header>
                <div class=margin>

                <form method="post" action="progress.php">
                    <div class="form-group">
                        <input type="text" placeholder="Enter your first name" name="firstname"
                        class="form-control" value="<?php echo $first_name?>">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter your last name" name="lastname"
                               class="form-control" value="<?php echo $last_name?>">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter your gender" name="gender"
                               class="form-control" value="<?php echo $gender?>">
                    </div>
                    <div class="form-group">
                        <input type="int" placeholder="Enter your age" name="age" class="form-control"
                               value="<?php echo $age?>">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter the gaming platform would you like " name="platform" class="form-control"
                               value="<?php echo $platform?>">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter what type of video game would you like(FPS,MMORPG...)"
                               name="game_type" class="form-control" value="<?php echo $game_type?>">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter the name of the game" name="game" class="form-control"
                               value="<?php echo $game_name?>">
                    </div>
                    <input type="submit" value="submit" class="btn btn-primary" name="submit">
                </form>
            </div>
        </div>
        </div><!--end container-->

    </main>
</html>
<?php require('footer.php'); ?>