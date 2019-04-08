<div class="bloc-1"></div>

<h1 class="admin-white-text text-center">Historique de mes commandes</h1>

<div class="bloc-1"></div>

<div class="offset-2">
<table class="articles">
    <thead>
        <th class="col-2 admin-white-text">Utilisateur</th>
        <th class="col-2 admin-white-text">Date de la commande</th>
        <th class="col-2 admin-white-text">Détail de la commande</th>
        <th class="col-2 admin-white-text">Total de la commande</th>
    </thead>
    <tbody>
    <?php
    foreach($commandes as $commande)
    {
        $prix = NULL;
        $panier = json_decode($commande[2]);
        echo '<tr>';
        echo '<td class="td1 col-2">'.$commande[5].' '.$commande[6].'</td>';
        echo '<td class="td2 col-2">'.date_format(date_create($commande[3]), 'd/m/Y à H:i').'</td>';
        echo '<td class="td3 col-2">';
        foreach ($panier as $article)
        {
            if($article->quantite > 0)
            {
                echo $article->quantite.'x ';
                echo $article->titre.'<br>';
                $prix[] =  $article->quantite * $article->prix;
            }
        }
        echo '</td>';
        $total = 0;
        foreach ($prix as $row) {
            $total += $row;
        }
        $total+=5;
        echo '<td class="td4 col-2">'.$total.'€</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
</div>