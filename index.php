<?php
    require_once 'db/db_connect.php';
    // if ($_POST) {
    //     $db = db_connect();
    //     $stmt = $db->prepare('SELECT * FROM `imdb_movie` WHERE `name` = ?');
    //     $stmt->execute($_GET['name']);
    //     $movie = $stmt->fetchAll();
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body class="d-flex flex-column justify-content-between">
    <?php include 'includes/navbar.php'; ?>

    <section id="main" class="w-50 mx-auto">
        <div class="text-center mb-5">
            <img class="img-fluid" src="images/Logo_JPMDb_150.png" alt="JPMDb Logo">
        </div>
        <h1 class="text-light jp-shadow">Search for a movie</h1>
        <form action="" method="post">
            <div class="form-group">
                <input class="form-control bg-dark border border-light text-light" type="search" name="search" placeholder="Search for a movie...">
            </div>
        </form>
    </section>

    <?php include 'includes/footer.php'; ?>

    <?php include 'includes/scripts.php'; ?>
</body>
</html>