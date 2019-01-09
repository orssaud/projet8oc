<?php $title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

        <h1>Billet simple pour l'Alaska</h1>
        <p>Derniers chapitres :</p>

        <form action="index.php?action=login" method="post">
            <button type="submit">connection</button>
        </form>
 
        
        <?php
        while ($data = $posts->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['title']) ?>
                    <em>le <?= $data['chapter_date'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br($data['content']) ?>
                    <br />
                    <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>