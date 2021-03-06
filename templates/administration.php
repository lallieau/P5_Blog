<?php $this->title = 'Administration'; ?>
<?php $this->description='Page d\'administration, accessible seulement pour les administrateurs...'; ?>

<div class="container">
    <h1>Administration</h1>

    <?php
    if($this->session->get('add_article')
        || $this->session->get('delete_user')
        || $this->session->get('edit_article')
        || $this->session->get('delete_article')
        || $this->session->get('delete_comment')
        || $this->session->get('no_validate_comment')
        || $this->session->get('validate_comment'))
    {
    ?>

    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">Infos</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <?= $this->session->show('add_article'); ?>
                <?= $this->session->show('delete_article'); ?>
                <?= $this->session->show('edit_article'); ?>
                <?= $this->session->show('delete_comment'); ?>
                <?= $this->session->show('delete_user'); ?>
                <?= $this->session->show('no_validate_comment'); ?>
                <?= $this->session->show('validate_comment'); ?>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

    <h2>Articles</h2>

    <div class="add_article">
        <a href="index.php?route=addArticle">Nouvel article</a>
    </div>

    <?php
    foreach ($articles as $article)
    {
    ?>
    <div class="card_admin">
        <h3>
            <a href="index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>">
                <?= htmlspecialchars($article->getTitle());?>
            </a>
        </h3>
        <?php
        if (!$article->getEditAt())
        {
        ?>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
        <?php
        }
        else
        {
        ?>
        <p>Modifié le : <?= htmlspecialchars($article->getEditAt());?></p>
        <?php
        }
        ?>
        <p><?= substr(htmlspecialchars($article->getChapo()), 0, 150);?>...</p>
        <p><?= substr(htmlspecialchars($article->getContent()), 0, 150);?>...</p><br>
        <p><?=ucfirst(htmlspecialchars($article->getAuthor()));?></p>
        <br>
        <button type="button">
        <a href="index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
        </button>
        <button type="button">
        <a href="index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
        </button>
    </div>
    <?php
    }
    ?>

    <h2>Commentaires</h2>

    <?php
    foreach($comments as $comment)
    {
    ?>
    <div class="card_admin">
        <h3><?=htmlspecialchars($comment->getPseudo());?></h3>
        <p><?=htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?=htmlspecialchars($comment->getCreatedAt());?></p>
        <br>
        <?php
        if($comment->isValidation())
        {
        ?>
        <button type="button">
            <a href="index.php?route=noValidateComment&commentId=<?= $comment->getId(); ?>">Ne plus valider le commentaire</a><br>
        </button>
        <?php
        }
        else
        {
        ?>
        <button type="button">
            <a href="index.php?route=validateComment&commentId=<?= $comment->getId(); ?>">Valider le commentaire</a><br>
        </button>
        <?php
        }
        ?>
        <br>
        <br>
        <button type="button">
            <a href="index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
        </button>
    </div>
    <?php
    }
    ?>

    <h2>Utilisateurs</h2>

    <?php
    foreach ($users as $user)
    {
    ?>
    <div class="card_admin">
        <p>Pseudo : <?= htmlspecialchars($user->getPseudo());?></p>
        <p>Date de création : <?= htmlspecialchars($user->getCreatedAt());?></p>
        <p>Rôle : <?= htmlspecialchars($user->getRole());?></p>
        <?php
        if($user->getRole() != 'admin') {
            ?><button type="button">
            <a href="index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
            </button>
        <?php
        }
        else
        {
        ?>
        <p>Suppression impossible</p>
        <?php
        }
        ?>
    </div>
    <?php
    }
    ?>
</div>
