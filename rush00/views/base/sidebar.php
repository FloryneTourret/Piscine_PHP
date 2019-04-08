<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="ajout.php">Ajouter un article</a><br>
    <a href="articles.php">Gérer les articles</a><br>
    <a href="categories.php">Gérer les catégories</a><br>
    <a href="utilisateurs.php">Gérer les utilisateurs</a><br>
    <a href="commandes.php">Historique des commandes</a>
</div>

<span style="color:white;font-size:30px;cursor:pointer;margin-left:20px;margin-top:20px;" onclick="openNav()">&#9776;</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>