<div class="bloc-1"></div>

<h1 class="admin-white-text text-center">Ajout d'un article</h1>

<div class="bloc-1"></div>

<div>
    <form class="add-articles col-6 offset-3" action="ajout.php" method="post">

        <input type="text" name="titre" id="titre" placeholder="Nom du produit" required>
        <input type="text" name="description" id="description" placeholder="Description du produit" required>
        <input type="number" name="prix" id="email" placeholder="Prix du produit" min="0" step="0.01" required>
        <p class="select-categorie-text admin-white-text">Séléctionnez une catégorie:</p>
        <select data-placeholder="Catégories" name="categories[]" id="categorie_select" multiple>
            <?php
            foreach($categories as $row)
                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
            ?>
        </select><br>
        <button type="submit" value="OK">Ajouter le produit</button>
    </form>
</div>
