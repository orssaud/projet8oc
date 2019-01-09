<?php
function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content, chapter_date FROM chapter ORDER BY chapter_date DESC LIMIT 0, 5');

    return $req;
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, chapter_date FROM chapter WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}

function addChapter($title, $chapter)
{
    $db = dbConnect();
    $newChapter = $db->prepare('INSERT INTO chapter(title, chapter_date, content) VALUES(?, NOW(), ?)');
    $addToDb = $newChapter->execute(array($title, $chapter));

    return $addToDb;
}

function verifyAccount($account)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT passwordAccount FROM `account` WHERE accountName = ?');
    $req->execute(array($account));
    $req = $req->fetch();

    return $req;
}

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=project8;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}


