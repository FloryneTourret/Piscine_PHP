<div class="bloc-1"></div>
<div id="w" class="col-8 offset-2">
    <header id="title">
      <h1>Mon Panier</h1>
    </header>
    <div id="page">
      <table id="cart">
          <?php if (isset($_SESSION['panier']))
          {
            $panier = json_decode($_SESSION['panier']);
            $prix = array();
            $thead = 0;
            foreach($panier as $article)
            {
                if($article->quantite > 0)
                {
                    $thead = 1;
                }
            }
            if($thead == 1)
            {
                echo '<thead>';
                echo '<tr>';
                echo '<th class="first">Photo</th>';
                echo '<th class="second">Qte</th>';
                echo '<th class="third">Produit</th>';
                echo '<th class="fourth">Total</th>';
                echo '<th class="fifth">&nbsp;</th>';
                echo '</tr>';
                echo '</thead>';
            }
            
          }
        
        ?>
        <tbody>
        <?php 
        if(!isset($_SESSION['panier']))
        {
            echo '<h3 class=text-center>Oh non, votre panier est vide !</h3><br>';
        }
        else
        {
            $panier = json_decode($_SESSION['panier']);
            $prix = array();
            foreach($panier as $article)
            {
                if($article->quantite > 0)
                {
                    echo '<tr class="productitm">
                        <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Emoji_u1f44c.svg/480px-Emoji_u1f44c.svg.png" class="thumb"></td>
                        <td class="col-3"><input disabled="disabled" type="number" value="'.$article->quantite.'" min="0" max="99" class="qtyinput">
                        <a onclick=plus('.$article->id.')><i class="fas fa-plus"></i></a>
                        <a onclick=moins('.$article->id.')> <i class="fas fa-minus"></i></a></td>
                        <td class="product-title">'.$article->titre.'</td>
                        <td>'.$article->prix.'</td>
                        <td><span class="remove"><a onclick=retirer('.$article->id.')> <i class="fas fa-trash"></i> </a></span></td>
                    </tr>';
                    $prix[] =  $article->quantite * $article->prix;
                }
                
            }
            $total = 0;
            foreach ($prix as $row) {
                $total += $row;
            }
            $total += 5;
            if($total == 5)
                echo '<h3 class=text-center>Oh non, votre panier est vide !</h3><br>';
            else{
                echo '
                <tr class="checkoutrow">
                    <td style="text-align:right;padding-right:25px;"colspan="5"><span class="thick">Frais de Livraison: 5.00€</span></td>
                </tr>
                <tr class="checkoutrow">
                    <td style="text-align:right;padding-right:25px;" colspan="5"><span class="thick">Total: '.$total.'€</span></td>
                </tr>
                <tr class="checkoutrow">
                    <td style="text-align:left;padding-left:25px;padding-bottom:25px;" colspan="5">
                    <span class="thick" style="font-size:2rem;">
                    <i class="fas fa-credit-card"></i>
                    <i class="fab fa-paypal"></i>
                    <i class="fab fa-bitcoin"></i></span>
                    </td>
                </tr>';
            }
        }
    echo '</tbody>
</table>
</div>
</div>';
if (isset($_SESSION['panier']))
{
    if($total != 5)
    {
    echo '<div class="col-10 valider">
    <button id="submitbtn"><a class="textco" href="valider.php">Je commande</a></button>
    </div>';
    }
    
}

?>

<script type="text/javascript">
    function plus(id)
    {
        const req = new XMLHttpRequest();
        req.open('GET', 'http://127.0.0.1/acheter.php?id=' + id, true);
        req.send();
        location.reload();
    }

    function moins(id)
    {
        const req = new XMLHttpRequest();
        req.open('GET', 'http://127.0.0.1/moins.php?id=' + id, true);
        req.send();
        location.reload();
    }

    function retirer(id)
    {
        const req = new XMLHttpRequest();
        req.open('GET', 'http://127.0.0.1/retirer.php?id=' + id, true);
        req.send();
        location.reload();
    }
</script>