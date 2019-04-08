<div class="articles-content">
    <div class="list-categories text-center">
    <?php
        foreach($categories as $row)
        {
            echo '<a class="categorie-lst" href="categories.php?categorie='.$row['0'].'">';
            echo $row['1'];
            echo '</a>';
        }
    ?>
    </div>
    <div class="title-page-categorie col-4 offset-2">
        <?php 
        
        if ($actual != FALSE)
            echo '<h1>'.$actual[1].'</h1>';
        
        ?>
    </div>
    <div class="articles-list offset-1">
        <?php
        if (!empty($articles))
        {
            foreach($articles as $row)
            {
                echo '<div class="col-3 article float-left article-'.$row['0'].'">';
                echo '<div class="article-title-'.$row['0'].'">';
                echo '<h2 class="article-title">'.$row['1'].'</h2>';
                echo '</div>';
                    echo '<div class="articles-content">';
                        echo '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Emoji_u1f44c.svg/480px-Emoji_u1f44c.svg.png">';
                        echo '<p class="article-description">'.$row['2'].'</p><br>';
                        echo '<p class="article-price">'.$row['3'].'€</p>';
                        echo '<button onclick="buy('.$row['0'].');">Acheter</button>';
                    echo '</div>';
                echo '</div>';
            }
        }
        ?>
        <div class="clearfix"></div>
    </div>
</div>
<script type="text/javascript">
        function buy(id)
        {
            const req = new XMLHttpRequest();
            req.open('GET', 'http://127.0.0.1/acheter.php?id=' + id, true);
            req.send();
            location.reload();
        }
    </script>
