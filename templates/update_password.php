<?php $this->title = 'Modifier mot mot de passe'; ?>
<div class="container">
    <h1>Mot de passe</h1>
    <div class="update_password">
        <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p>
        <form method="post" action="../public/index.php?route=updatePassword" class="form_basic">
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Mettre à jour" id="submit" name="submit">
        </form>
    </div>
    <div class="link_admin">
    <a href="../public/index.php">Retour à l'accueil</a>
    </div>
</div>