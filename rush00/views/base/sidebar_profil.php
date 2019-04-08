<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="profil.php">Gérer mon profil</a><br>
  <a href="commandes.php">Voir mon historique de commandes</a><br>
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