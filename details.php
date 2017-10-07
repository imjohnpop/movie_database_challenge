<?php
    require_once 'db/db_connect.php';
    // if (strlen($_GET['id'])!=0) {
    //     $db = db_connect();
    //     $stmt = $db->prepare('SELECT * FROM `imdb_movie` WHERE `imdb_id` = ?');
    //     $stmt->execute($_GET['id']);
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
        <div id="details" class="border border-light mh-75 text-dark jp-bg-details p-3">
            details
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>   

    <?php include 'includes/scripts.php'; ?>
</body>
</html>