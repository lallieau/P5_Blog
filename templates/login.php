<?php $this->title = "Connexion"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('error_login'); ?>
<div>
    <a class="nav-link" href="index.php?route=register">Inscription</a>
    <form method="post" action="index.php?route=login">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>

        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>

        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>
    <a href="index.php">Retour à l'accueil</a>
</div>