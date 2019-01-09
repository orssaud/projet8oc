<?php

//require('model/model.php');
require_once('model/dataBase.php'); 
require_once('model/postManager.php');
require_once('model/commentsManager.php');
require_once('model/chapterManager.php');
require_once('model/accountManager.php');

/* --------------------------------------------
					POSTS
----------------------------------------------*/
function listPosts()
{
$postManager = new postManager();
$posts = $postManager->listPosts();

require('view/listPostsView.php');
}

/* --------------------------------------------
				ONLY ONE POST
----------------------------------------------*/
function post()
{
	$postManager = new postManager();
	$commentsManager = new commentsManager();

	$post = $postManager->onePost($_GET['id']);
	$comments = $commentsManager->commentsForOnePost($_GET['id']);

    require('view/postView.php');
}

/* --------------------------------------------
					COMMENT
----------------------------------------------*/

function addComment($postId, $author, $comment)
{
	$commentsManager = new commentsManager();
	$post = $commentsManager->addComment($postId, $author, $comment);

    if ($post === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }

}

function report($postId, $commentId)
{
	$commentsManager = new commentsManager();
	$post = $commentsManager->reported($postId, $commentId);

    if ($post === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function getNewCommentsNumber()
{
	
	$commentsManager = new commentsManager();
	$posts = $commentsManager->getNewComments();
	
	$newComments = count($posts);
	
	return $newComments;

}
function getNewComments()
{
	$p = 0;

	$commentsManager = new commentsManager();
	$posts = $commentsManager->getNewComments();
	
	require('view/commentsView.php');
}
function getAllComments()
{
	$p = 1;


	$commentsManager = new commentsManager();
	$posts = $commentsManager->getAllComments();
	
	require('view/commentsView.php');
}
function getReportedComments()
{
	$p = 2;

	$commentsManager = new commentsManager();
	$posts = $commentsManager->getReportedComments();
	
	require('view/commentsView.php');
}

function deleteComment($id, $p)
{
	$commentsManager = new commentsManager();
	$commentsManager->deleteComment($id);

	if($p == 1){
		getAllComments();
	}elseif($p ==2){
		getReportedComments();
	}else{
		getNewComments();
	}

}
function deleteComments($id) // chapter id
{
	$commentsManager = new commentsManager();
	$commentsManager->deleteComments($id);

}

/* --------------------------------------------
					CHAPTER
----------------------------------------------*/


function saveChapter($title, $chapter)
{

	$chapterManager = new chapterManager();
	$post = $chapterManager->saveChapter($title, $chapter);


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

	$chapterManager = new chapterManager();
	$post = $chapterManager->editChapter($_GET['id']);
	require('view/editChapter.php');
}

function saveEdit($title, $chapter, $id){
	$chapterManager = new chapterManager();
	$post = $chapterManager->updateChapter($title, $chapter, $id);

	if ($post === false){
		die('Impossible d\'ajouter le chapitre !');
	}
	else {
        header('Location: index.php');
    }

}
function deleteChapter($id)
{
	$chapterManager = new chapterManager();
	$post = $chapterManager->deleteChapter($id);

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
	$accountManager = new accountManager();
	$post = $accountManager->connect($account);

    if($post !== false && password_verify($password, $post->passwordAccount)) {
        
        $accountManager->createSession($post->passwordAccount,$account);

        $_SESSION['newComments'] = getNewCommentsNumber();

 
        return true;
    }
    else{
     
        return false;
    }
}

function destroySession()
{
	$_SESSION = array();
	session_destroy();
	listPosts();
}
