<?php
    // require_once 'db/db_connect.php';
    // if (strlen($_GET['id'])!=0) {
    //     $db = db_connect();
    //     $stmt = $db->prepare('SELECT * FROM `imdb_movie` WHERE `imdb_id` = ?');
    //     $stmt->execute([$_GET['id']]);
    //     $movie = $stmt->fetchAll();
    // }


    // SELECT column_name(s)
    // FROM table1
    // LEFT JOIN table2 ON table1.column_name = table2.column_name;


    require 'db/db.php';

    $query = 'SELECT * FROM `imdb_movie` 
                
            WHERE `imdb_id`=?';
    if (strlen($_GET['id'])!=0) {
        $stmt = db::query($query, [$_GET['id']]);
        $movie = $stmt->fetchAll();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body class="d-flex flex-column justify-content-between">
    <?php include 'includes/navbar.php'; ?>

    <section id="main" class="w-50 mx-auto">
        <div id="details" class="border border-light text-dark jp-bg-details">
            <div class="m-4" style="overflow: scroll; max-height: 50vh;">
                <?php foreach ($movie as $detail) :?>
                
                    <?php foreach ($detail as $key => $info) :?>
                        <p><?php echo $key . ' - ' . $info;?></p>
                    <?php endforeach; ?>
                    
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>   

    <?php include 'includes/scripts.php'; ?>
</body>
</html>