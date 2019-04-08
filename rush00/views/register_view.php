<div class="bloc-1"></div>

<h1 class="connexion-title admin-white-text text-center">Inscription</h1>

<div>
    <form class="col-4 offset-4 add-articles " action="register.php" method="post">
        <input type="text" name="firstname" id="firstname" placeholder="Votre prénom" required><br>
        <input type="text" name="lastname" id="lastname" placeholder="Votre nom" required><br>
        <input type="email" name="email" id="email" placeholder="Votre email" required><br>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe" required><br>
        <input type="password" name="password_repeat" id="password_repeat" placeholder="Répétez votre mot de passe" required><br>
        <div class="g-recaptcha" data-sitekey="6LeUtpwUAAAAAI6IF7x7U1v8_9Ugs71V8F9paE2D"></div>
        <button type="submit" value="OK">M'inscrire</button>
    </form>
</div>