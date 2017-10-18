<?php
    require 'db/db.php';
    
    $query = 'SELECT * FROM `imdb_movie` WHERE `name` LIKE ?';
    if($_POST) {
        $name = '%' . $_POST['search'] . '%';
        $stmt = db::query($query, [$name]);
        $movies = $stmt->fetchAll();
        if (empty($movies)||(strlen(str_replace(' ', '', $_POST['search']))==0)) {
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
        <?php if (strlen($_POST['search'])!=0) : ?>
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