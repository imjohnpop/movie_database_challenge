<section id="main" class="w-50 mx-auto">
    <h1 class="text-light jp-shadow">Results</h1>
    <div id="details" class="border border-light text-dark jp-bg-gold">
        <div class="my-4" style="overflow: scroll; max-height: 50vh;">
            <ul>
                <?php if ($movies == 'No matches found') :?>
                    <?= '<h2>' . $movies . '</h2>' ?>
                    <?= '<a href="index.php" class="text-dark">Go back</a>' ?>
                <?php else : ?>
                    <?php foreach ($movies as $movie) : ?>
                        <li style="list-style-type: none;">
                            <a href="details.php?id=<?=$movie['imdb_id'];?>" class="text-dark">
                                <?php $movie['Name'] = preg_replace("/\p{L}*?".$_POST['search']."\p{L}*/ui", "<b>$0</b>", $movie['Name']); ?>
                                <?=$movie['Name'] . ' (' . $movie['year'] . ')';?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>