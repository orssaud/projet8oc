<?php

require('model/model.php');

function listPosts()
{
    $posts = getPosts();

    require('view/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('view/postView.php');
}

function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function login()
{
	require('view/loginView.php');
}

function connect($account, $password)
{
	$dbPassword = verifyAccount($account);

    if(password_verify($password, $dbPassword['passwordAccount'])) {
        
        createSession($dbPassword['passwordAccount']);
        return true;
    }
    else{
     
        return false;
    }
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
	       
	 $posts = getPosts();
	require('view/loggedView.php');
}

function saveChapter($title, $chapter)
{
	$addToDb = addChapter($title, $chapter);

	if ($addToDb === false){
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