<?php
    // require_once 'db/db_connect.php';
    // if ($_POST) {
    //     $db = db_connect();
    //     $stmt = $db->prepare('SELECT * FROM `imdb_movie` WHERE `name` LIKE ?');
    //     $stmt->execute(['%' . $_POST['name'] . '%']);
    //     $movies = $stmt->fetchAll();
    //     if (empty($movies)||(strlen(str_replace(' ', '', $_POST['name']))==0)) {
    //         $movies = 'No matches found';
    //     }
    // }
    require 'db/db.php';
    
    $query = 'SELECT * FROM `imdb_movie` WHERE `name` LIKE ?';
    if($_POST) {
        $name = '%' . $_POST['name'] . '%';
        $stmt = db::query($query, [$name]);
        $movies = $stmt->fetchAll();
        if (empty($movies)||(strlen(str_replace(' ', '', $_POST['name']))==0)) {
            $movies = 'No matches found';
        }
    }    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body class="d-flex flex-column justify-content-between">
    <?php include 'includes/navbar.php'; ?>

    <?php if ($_POST) : ?>
        <?php if (strlen($_POST['name'])!=0) : ?>
            <?php include 'includes/result.php'; ?>
        <?php else : ?>
            <?php include 'includes/search.php'; ?>
            <div class="w-25 mt-2 mx-auto border border-dark rounded alert alert-danger" role="alert">
                You have not filled the search bar!
            </div>
        <?php endif; ?>
    <?php else : ?>
        <?php include 'includes/search.php'; ?>
    <?php endif; ?>

    <?php include 'includes/footer.php'; ?>

    <?php include 'includes/scripts.php'; ?>
</body>
</html>