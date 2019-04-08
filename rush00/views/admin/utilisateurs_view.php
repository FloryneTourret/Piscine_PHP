<div class="bloc-1"></div>

<h1 class="admin-white-text text-center">Gestion des utilisateurs</h1>

<div class="bloc-1"></div>

<div>

<div class="offset-2">
    <div id="utilisateurs">
        <table class="utilisateurs" id="liste_utilisateurs">
            <?php 
                foreach ($utilisateurs as $utilisateur)
                {
                    echo '<tr>
                        <td class="col-2"><p class="admin-white-text">'.$utilisateur[1].' '.$utilisateur[2].'</p></td>
                        <td class="col-2 text-center"><p class="admin-white-text">'.$utilisateur[3].'</p></td>
                        <td class="col-2 text-center"><p class="admin-white-text">'.ucfirst($utilisateur[5]).'</p></td>
                        <td class="col-2 text-right"><a href="#" onclick="delete_user('.$utilisateur[0].', \''.$utilisateur[3].'\')" class="delete"><i class="fas fa-trash"></a></i></td>
                    </tr>';
                }
            ?>
        </table>
    </div>
</div>

<script>

function delete_user(id, categorie) {
  var r = confirm("Voulez vous supprimer l'utilisateur \"" + categorie + "\"?");
  if (r == true) {
    const req = new XMLHttpRequest();
    req.open('GET', 'http://127.0.0.1/admin/utilisateurs.php?del=' + id, true); 
    req.send();
    location.reload();
  }
}

</script>
