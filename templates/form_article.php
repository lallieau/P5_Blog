<?php
$route = isset($article) && $article->getId() ? 'editArticle&articleId='.$article->getId() : 'addArticle';
$submit = $route === 'addArticle' ? 'Envoyer' : 'Mettre à jour';
$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()): '';
$content = isset($article) && $article->getContent() ? htmlspecialchars($article->getContent()): '';
$author = isset($article) && $article->getAuthor() ? htmlspecialchars($article->getAuthor()): '';
?>

<div>
    <form method="post" action="../public/index.php?route=<?= $route; ?>">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" value="<?= $title; ?>"><br>
        <?= isset($errors['title']) ? $errors['title'] : ''; ?>

        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"><?= $content; ?></textarea><br>
        <?= isset($errors['content']) ? $errors['content'] : ''; ?>

        <label for="author">Autheur</label><br>
        <input type="text" id="author" name="author" value="<?= $author; ?>"><br>
        <?= isset($errors['author']) ? $errors['author'] : ''; ?>

        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>

</div>