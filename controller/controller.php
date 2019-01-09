<?php

//require('model/model.php');
require('model/dataBase.php');


/* --------------------------------------------
					POSTS
----------------------------------------------*/
function listPosts($logged = false)
{
	$db = new dataBase('project8');
	$posts = $db->query('SELECT id, title, content, chapter_date FROM chapter ORDER BY chapter_date DESC LIMIT 0, 5');

require('view/listPostsView.php');
}

/* --------------------------------------------
				ONLY ONE POST
----------------------------------------------*/
function post()
{
    $db = new dataBase('project8');
	$post = $db->prepare('SELECT id, title, content, chapter_date FROM chapter WHERE id = ?', [$_GET['id']], true);
	$comments = $db->prepare('SELECT id, author, comment, comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC', [$_GET['id']]);

    require('view/postView.php');
}

/* --------------------------------------------
					COMMENT
----------------------------------------------*/

function addComment($postId, $author, $comment)
{

    $db = new dataBase('project8');
    $post = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, reported) VALUES(?, ?, ?, NOW(), 0)', [$postId,$author,$comment]);

    if ($post === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }

}

function report($postId, $commentId)
{
	$db = new dataBase('project8');
	$post = $db->prepare('SELECT reported FROM comments WHERE id = ?', [$commentId], true);
   // $post = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, reported) VALUES(?, ?, ?, NOW(), 0)', [$postId,$author,$comment]);
	
	$repotedNum = intval($post->reported);
	$repotedNum ++;
	//die(var_dump($repotedNum));

	$post = $db->prepare('	UPDATE comments
							SET reported = ?
							WHERE id = ?', 
							[$repotedNum, $commentId]);
 
    if ($post === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function getNewComments()
{
	$logDate =  $_SESSION['lastLogin'];
	
	$db = new dataBase('project8');
	$posts = $db->prepare('SELECT *
						FROM comments
						WHERE comment_date 
						BETWEEN ? AND NOW()
						ORDER BY comment_date DESC', [$logDate]);
	return $posts;
}
function getAllComments()
{
	$db = new dataBase('project8');
	$posts = $db->query('SELECT *
						FROM comments
						ORDER BY comment_date DESC');
	return $posts;
}
function getReportedComments()
{
	$db = new dataBase('project8');
	$posts = $db->query('SELECT *
						FROM comments
						WHERE reported >= 1
						ORDER BY reported DESC');
	return $posts;
}
function allComments()
{	
	$newComments = getNewComments();
	$allComments = getAllComments();
	$reportedComments = getReportedComments();

	require('view/commentsView.php');
}
function deleteComment($id)
{
	$db = new dataBase('project8');
	$post = $db->prepare('DELETE FROM `comments`
						WHERE `id` = ?',
						 [$id]);
	allComments();

}
function DeleteComments($id) // chapter id
{
	$db = new dataBase('project8');
	$post = $db->prepare('DELETE FROM `comments`
						WHERE `post_id` = ?',
						 [$id]);

}

/* --------------------------------------------
					CHAPTER
----------------------------------------------*/


function saveChapter($title, $chapter)
{

	    $db = new dataBase('project8');
	    $post = $db->prepare('INSERT INTO chapter(title, chapter_date, content) VALUES(?, NOW(), ?)', [$title,$chapter]);

	//$addToDb = addChapter($title, $chapter);

	if ($post === false){
		die('Impossible d\'ajouter le chapitre !');
	}
	else {
        header('Location: index.php');
    }
}

function newChapter()
{
	require('view/newChapter.php');
}

function editChapter(){
	$db = new dataBase('project8');
	$post = $db->prepare('SELECT id, title, content, chapter_date FROM chapter WHERE id = ?', [$_GET['id']], true);
	require('view/editChapter.php');
}

function saveEdit($title, $chapter, $id){
	$db = new dataBase('project8');
	$post = $db->prepare('	UPDATE chapter
							SET title = ?,
							  content = ?
							WHERE id = ?', 
							[$title, $chapter, $id]);

	if ($post === false){
		die('Impossible d\'ajouter le chapitre !');
	}
	else {
        header('Location: index.php');
    }

}
function DeleteChapter($id)
{
	$db = new dataBase('project8');
	$post = $db->prepare('DELETE FROM `chapter`
						WHERE `id` = ?',
						 [$id]);
deleteComments($id);
listPosts();
}
/* --------------------------------------------
					SESSION
----------------------------------------------*/	


function login()
{
	require('view/loginView.php');
}

function connect($account, $password)
{

	$db = new dataBase('project8');
	$post = $db->prepare('SELECT passwordAccount FROM `account` WHERE accountName = ?', [$account], true);

    if($post !== false && password_verify($password, $post->passwordAccount)) {
        
        createSession($post->passwordAccount);

       $_SESSION['lastLogin'] = getLoginDate();

       $_SESSION['newComments'] = count(getNewComments());
   /*	var_dump($_SESSION['pseudo']);
   		var_dump($_SESSION['lastLogin']);
   		var_dump(getLoginDate());*/
        //getLoginDate($account)->lastLogin
        setLoginDate();	

        return true;
    }
    else{
     
        return false;
    }
}

function getLoginDate()
{
	$db = new dataBase('project8');
	$post = $db->prepare('SELECT lastLogin FROM `account` WHERE accountName = ?', [$_SESSION['pseudo']], true);
	
	return $post->lastLogin;

}
function setLoginDate()
{
	$db = new dataBase('project8');
		$post = $db->prepare('	UPDATE account
							SET lastLogin = NOW()
							WHERE accountName = ?', 
							[$_SESSION['pseudo']]);
}
function createSession($password)
{
	$_SESSION['id'] = $password;
	$_SESSION['pseudo'] = $_POST['account'];
}
function destroySession()
{
	$_SESSION = array();
	session_destroy();
	listPosts();
}

function logged()
{


	listPosts(true);
	
}
