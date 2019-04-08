<?php 

function get_article($mysqli, $id)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `articles` WHERE `id` = $id");
    $article = mysqli_fetch_assoc($result);
    if (isset($article))
        return $article;
    return FALSE;
}
?>