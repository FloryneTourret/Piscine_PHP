<div class="profile-content">
    <div class="col-6 offset-3 text-center">
        <h1 class="admin-white-text" id="profil-title">Bonjour, <?php echo $_SESSION['firstname']?></h1>
    </div>

    <div class="update-account col-6 offset-3">
    <h2 class="admin-white-text" id="title-update">Ici, vous pouvez modifier vos informations.</h2>
        <form action="update_mail.php" method="post">
            <h3 class="admin-white-text">Modifier mon adresse mail</h3>
            <?php 
            if (isset($_SESSION['mail-message']))
            {
                echo '<p class="update-message update-message-success">'.$_SESSION['mail-message'].'</p>';
                $_SESSION['mail-message'] = null;
            }
            else if (isset($_SESSION['mail-message-error']))
            {
                echo '<p class="update-message update-message-error">'.$_SESSION['mail-message-error'].'</p>';
                $_SESSION['mail-message-error'] = null;
            }
            ?>
            <input type="password" d="pwdmail" name="pwdmail" placeholder="Entrez votre mot de passe actuel" required><br>
            <input type="mail" id="newmail" name="newmail" placeholder="Entrez votre nouvelle adresse mail" required><br>
            <button type="submit">Changer mon adresse mail</button>
        </form>

        <form action="update_password.php" method="post">
            <h3 class="admin-white-text">Modifier mon mot de passe</h3>
            <?php 
            if (isset($_SESSION['message']))
            {
                echo '<p class="update-message update-message-success">'.$_SESSION['message'].'</p>';
                $_SESSION['message'] = null;
            }
            else if (isset($_SESSION['message-error']))
            {
                echo '<p class="update-message update-message-error">'.$_SESSION['message-error'].'</p>';
                $_SESSION['message-error'] = null;
            }
            ?>
            <input type="password" id="oldpwd" name="oldpwd" placeholder="Entrez votre mot de passe actuel" required><br>
            <input type="password" id="newpwd" name="newpwd" placeholder="Entrez votre nouveau mot de passe" required><br>
            <input type="password" id="newpwdr" name="newpwdr" placeholder="Répétez votre nouveau mot de passe" required><br>
            <button type="submit">Changer mon mot de passe</button>
        </form>
    </div>

    <div class="delete-account col-6 offset-3">

        <form class="form-special" action="delete_account.php" method="post">
            <h3 class="admin-white-text">Supprimer mon compte (irréversible)</h3>
            <input class="special-input" type="password" name="pwd" id="pwd" placeholder="Entrez votre mot de passe" required><br>
            <button class="delete-input" type="submit">Supprimer mon compte</button>
        </form>

    </div>
</div>