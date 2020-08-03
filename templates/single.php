<?php $this->title = "Article"; ?>

<h1>Le blog</h1>
<h2>Lallie Audry</h2>

<div>
    <h2><?=htmlspecialchars($article->getTitle());?></h2>
    <p><?=htmlspecialchars($article->getChapo());?></p>
    <p><?=htmlspecialchars($article->getContent());?></p>
    <p><?=htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?=htmlspecialchars($article->getCreatedAt());?></p>
</div>
<br>

<a href="../public/index.php">Retour à l'acceuil</a>
<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Ajouter un commentaire</h3>
    <?php include('form_comment.php'); ?>

    <h3>Commentaires</h3>

    <?php
    foreach($comments as $comment)
    {
    ?>
    <h4><?=htmlspecialchars($comment->getPseudo());?></h4>
    <p><?=htmlspecialchars($comment->getContent());?></p>
    <p>Posté le <?=htmlspecialchars($comment->getCreatedAt());?></p>

    <?php
    if($comment->isFlag())
    {
    ?>
    <p>Ce commentaire a déjà été signalé</p>
    <?php
    }
    else
    {
    ?>
    <p><a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
    <?php
    }
    ?>
    <p><a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a></p>
    <br>
    <?php
    }
    ?>
</div>

