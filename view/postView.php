<?php $title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

        <h1>Billet simple pour l'Alaska</h1>
        <p><a href="index.php">Retour à la liste des chapitres</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['chapter_date'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>