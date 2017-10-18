<?php
    require 'db/db.php';
    $id = $_GET['id'];

    $query_main = 'SELECT * FROM `imdb_movie` 
        LEFT JOIN `imdb_movie_type` 
        ON `imdb_movie`.`imdb_movie_type_id`=`imdb_movie_type`.`id`
        WHERE `imdb_id`=?';
    if (strlen($id)!=0) {
        $stmt = db::query($query_main, [$id]);
        $movie = $stmt->fetchAll();
    }

    $query_genre = 'SELECT * FROM `imdb_movie_has_genre` 
        LEFT JOIN `imdb_genre` 
        ON `imdb_movie_has_genre`.`imdb_genre_id`=`imdb_genre`.`id`
        WHERE `imdb_movie_id`=?';
    if (strlen($id)!=0) {
        $stmt = db::query($query_genre, [$id]);
        $genre = $stmt->fetchAll();
    }

    $query_country = 'SELECT * FROM `imdb_movie_has_origin_country` 
        LEFT JOIN `imdb_movie_origin_country` 
        ON `imdb_movie_has_origin_country`.`imdb_movie_origin_country_id`=`imdb_movie_origin_country`.`id`
        WHERE `imdb_movie_id`=?';
    if (strlen($id)!=0) {
        $stmt = db::query($query_country, [$id]);
        $country = $stmt->fetchAll();
    }

    $query_lang = 'SELECT * FROM `imdb_movie_has_language` 
        LEFT JOIN `imdb_language` 
        ON `imdb_movie_has_language`.`imdb_language_id`=`imdb_language`.`id`
        WHERE `imdb_movie_id`=?';
    if (strlen($id)!=0) {
        $stmt = db::query($query_lang, [$id]);
        $language = $stmt->fetchAll();
    }

    $query_persons = 'SELECT * FROM `imdb_movie_has_person` 
        LEFT JOIN `imdb_person` 
        ON `imdb_movie_has_person`.`imdb_person_id`=`imdb_person`.`imdb_id`
        LEFT JOIN `imdb_position` 
        ON `imdb_movie_has_person`.`imdb_position_id`=`imdb_position`.`id`
        WHERE `imdb_movie_id`=?';
    if (strlen($id)!=0) {
        $stmt = db::query($query_persons, [$id]);
        $persons = $stmt->fetchAll();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body class="d-flex flex-column justify-content-between" style="max-height: 100vh;">
    <?php include 'includes/navbar.php'; ?>

    <section id="main" class="w-50 mx-auto">
        <div id="details" class="container border border-light text-dark jp-bg-gold py-1">
            <div class="text-center">
                <h1><?php foreach ($movie as $detail) { echo $detail['Name'];};?></h1>
                <p>( <?php foreach ($movie as $detail) { echo $detail['name'];};?> )</p>
            </div>
            <hr class="w-75">
            <div class="m-4 row" style="overflow: scroll; max-height: 50vh;">
                <div class="col-12 col-lg-6">
                    <h2>Genre:</h2>
                    <p><?php foreach ($genre as $detail) { echo $detail['name'] . ' ';};?></p>
                    <h2>Year:</h2>
                    <p><?php foreach ($movie as $detail) { echo $detail['year'];};?></p>
                    <h2>Country & Language:</h2>
                    <p>
                    <span><?php foreach ($country as $detail) { echo $detail['name'] . ' ';};?></span>
                    - 
                    <span><?php foreach ($language as $detail) { echo $detail['name'];};?></span>
                    </p>
                    <h2>Rating & Votes:</h2>
                    <div class="progress bg-transparent border border-dark">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php foreach ($movie as $detail) { echo $detail['rating'];};?>"
                        aria-valuemin="0" aria-valuemax="10" 
                        style="width:<?php foreach ($movie as $detail) { $number=$detail['rating']*10; echo $number;};?>%;
                         background-color: rgba(138, 0, 5, 0.8);">
                            <span><?php foreach ($movie as $detail) { echo $detail['rating'];};?> / 10 (<?php foreach ($movie as $detail) { echo $detail['votes_nr'];};?>)</span>
                        </div>
                    </div>
                    <h2>Original Music by</h2>
                    <?php      foreach ($persons as $detail) {
                        if ($detail['imdb_position_id']==258) {
                        echo '<p>' . $detail['fullname'] . '</p>';
                        }
                    }   ?>
                    <h2>Cinematography by: </h2>
                    <?php      foreach ($persons as $detail) {
                        if ($detail['imdb_position_id']==259) {
                        echo '<p>' . $detail['fullname'] . '</p>';
                        }
                    }   ?>
                </div>
                <div class="col-12 col-lg-6">
                    <h2>Cast:</h2>
                    <div  style="overflow: scroll; max-height: 50%;">
                        <?php      foreach ($persons as $detail) {
                            if ($detail['imdb_position_id']==254) {
                            echo '<p>' . $detail['fullname'] . ' as ' . $detail['description'] . '</p>';
                            }
                        }   ?>
                    </div>
                    <h2>Directed by:</h2>
                    <?php      foreach ($persons as $detail) {
                        if ($detail['imdb_position_id']==255) {
                        echo '<p>' . $detail['fullname'] . '</p>';
                        }
                    }   ?>
                    <h2>Writing credits: </h2>
                    <?php      foreach ($persons as $detail) {
                        if ($detail['imdb_position_id']==256) {
                        echo '<p>' . $detail['fullname'] . '</p>';
                        }
                    }   ?>
                    <h2>Produced by:</h2>
                    <?php      foreach ($persons as $detail) {
                        if ($detail['imdb_position_id']==257) {
                        echo '<p>' . $detail['fullname'] . '</p>';
                        }
                    }   ?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>   

    <?php include 'includes/scripts.php'; ?>
</body>
</html>