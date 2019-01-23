<?php

require_once('model/dataBase.php'); 
require_once('model/chapterManager.php');
require_once('model/commentsManager.php');
require_once('model/accountManager.php');
require_once('model/recoveryManager.php');

require_once('lib/relativeTime.php');
require_once('lib/rand.php');

/* --------------------------------------------
					POSTS
----------------------------------------------*/
function listPosts() //show all chapter "home page"
{
	$chapterManager = new \projet8\chapterManager();
	$posts = $chapterManager->listPosts();

	require('view/listPostsView.php');
}

/* --------------------------------------------
				ONLY ONE POST
----------------------------------------------*/
function post($id) // show on chapter (by id)
{
	
	$chapterManager = new \projet8\chapterManager();
	$commentsManager = new \projet8\commentsManager();
	$time = new \projet8\time(); // relative time

	$post = $chapterManager->onePost($id);
	if($post){ 
		$comments = $commentsManager->commentsForOnePost($id);

		/*
		create a comment array
		order by ID with children comments
		*/
	        $commentsById = [];

        foreach($comments as $comment){
            if($comment->reply === null){
                $commentsById[$comment->id] = $comment;
            }
            
        }

        foreach($comments as $comment){

            if($comment->reply !== null){
                $commentsById[$comment->reply]->children[] = $comment;
            }
        }

    require('view/postView.php');
	}
	else{
		require('view/noChapterView.php');
	}
	
}

/* --------------------------------------------
					COMMENTS
----------------------------------------------*/

function addComment($postId, $author, $comment, $byAuthor, $comId)
{

	$commentsManager = new \projet8\commentsManager();
	$post = $commentsManager->addComment($postId, $author, $comment, $byAuthor, $comId);

    if ($post === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }

}

function report($postId, $commentId)
{
	$commentsManager = new \projet8\commentsManager();
	$post = $commentsManager->reported($postId, $commentId);

    if ($post === false) {
        throw new Exception('Impossible de signaler le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function getNewCommentsNumber()// count the number of new comment you have for add a notification when you login 
{
	
	$commentsManager = new \projet8\commentsManager();
	$posts = $commentsManager->getNewComments();
	
	$newComments = count($posts);
	
	return $newComments;

}
function getNewComments()
{
	$time = new \projet8\time();

	$p = 0; //nav menu 0 

	$commentsManager = new \projet8\commentsManager();
	$posts = $commentsManager->getNewComments();
	
	require('view/commentsView.php');
}
function getAllComments()
{
	$time = new \projet8\time();

	$p = 1;  //nav menu 1 


	$commentsManager = new \projet8\commentsManager();
	$posts = $commentsManager->getAllComments();
	
	require('view/commentsView.php');
}
function getReportedComments()
{
	$time = new \projet8\time();
	
	$p = 2;  //nav menu 2 

	$commentsManager = new \projet8\commentsManager();
	$posts = $commentsManager->getReportedComments();
	
	require('view/commentsView.php');
}

function deleteComment($id, $p)
{

	/*
	$p is for nav menu in comment admin panel 
	if p = 0 menu is focus on new comments
	if p = 1  menu is focus on all comments
	if p = 2 menu is focus on reported comments 
	*/

	$commentsManager = new \projet8\commentsManager();
	$commentsManager->deleteComment($id);

	// $p is use for go back at the good page after had delete a comment

	if($p == 1){
		getAllComments();
	}elseif($p ==2){
		getReportedComments();
	}else{
		getNewComments();
	}

}
function deleteCommentPost($id, $postId) //delete a comment directly on a chapter page
{
	$commentsManager = new \projet8\commentsManager();
	$commentsManager->deleteComment($id);

post($postId);

}
function deleteComments($id) // When user delete a chapter this function delete all comments associate to the chapter ($id is the id of this chapter)
{
	$commentsManager = new \projet8\commentsManager();
	$commentsManager->deleteComments($id);

}

/* --------------------------------------------
					CHAPTER
----------------------------------------------*/


function saveChapter($title, $chapter)
{

	$chapterManager = new \projet8\chapterManager();
	$post = $chapterManager->saveChapter($title, $chapter);


	if ($post === false){
		throw new Exception('Impossible d\'ajouter le chapitre !');

	}
	else {
        header('Location: index.php');
    }
}

function newChapter()
{
	require('view/newChapterView.php');
}

function editChapter(){

	$chapterManager = new \projet8\chapterManager();
	$post = $chapterManager->editChapter($_GET['id']);
	require('view/editChapterView.php');
}

function saveEdit($title, $chapter, $id){
	$chapterManager = new \projet8\chapterManager();
	$post = $chapterManager->updateChapter($title, $chapter, $id);

	if ($post === false){
		throw new Exception('Impossible d\'ajouter le chapitre !');
	}
	else {
        header('Location: index.php');
    }

}
function deleteChapter($id)
{
	$chapterManager = new \projet8\chapterManager();
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
	$account = addslashes($account);

	$accountManager = new \projet8\accountManager();
	$post = $accountManager->connect($account);

    if($post !== false && password_verify($password, $post->passwordAccount)) {
        
        $accountManager->createSession($post->passwordAccount,$account);

        $_SESSION['newComments'] = getNewCommentsNumber();

 
       
        listPosts();
    }
    else{
     
        	 echo '<div class="error">Mauvais identifiant ou mot de passe !</div>';
					login();
    }
}

function destroySession()
{
	$_SESSION = array();
	session_destroy();
	listPosts();
}




/* --------------------------------------------
				PASSWORD RECOVERY
----------------------------------------------*/	



function password($errors = null){
	require('view/passwordForgotView.php');
}
function passwordRecovery($email){

	if (filter_var($email, FILTER_VALIDATE_EMAIL)){ // verify if this email have a email format 
		$accountManager = new \projet8\accountManager();
		$req = $accountManager->accountEmail($email);
	
		if (isset($req->email ) && $req->email == $email){ // verify if this email is in the database
			$rnd = new \projet8\rand();
			$key = $rnd->randStr(8);

			$recovery = new \projet8\recovery();

				if ($recovery->newRecovery($email, $key)){ // create security key
					require('var/mail.php');
					mail($email , $objet, utf8_decode($mail) );
					$successes[] = 'Un email de récupération de mot de passe vous a été envoyé.';
				}else{
					
					$successes[] = 'Un email de récupération de mot de passe vous a déjà été envoyé il y a moins de 5 minutes.';
				}
			
			require('view/passwordForgotView.php');
			
		}else{
			$errors[] = "L'email n'est pas valide.";
			require('view/passwordForgotView.php');
		}
		


	}else{
		$errors[] = "L'email n'est pas valide.";
		require('view/passwordForgotView.php');
	}

}

function recovery(){

	require('view/recoveryView.php');
}



function newPassword($email, $key, $password, $confirmPassword){

	
		$recovery = new \projet8\recovery();
		$req = $recovery->accountInfo($email);

		if($req){

			if ($req->email === $email ){
				
				if (!password_verify($key, $req->security_key)){
					
					$errors[] = "La clé n'est pas valide.";

				}
				if ($req->date + 86400 < time()){ // after 24h key is not valid any more
					$errors[] = "La clé n'est plus valide, demander une nouvelle clé <a href='index.php?action=password'>ici</a>.";
				}
			}else{
				$errors[] = "L'email n'est pas valide.";
			}


		}else{
			$errors[] = "Aucune demande de récupération de mot de passe n'a été effectué pour ce compte.";
		}
		


	if ($password === $confirmPassword){
		if (strlen($password) < 8){
			$errors[] = "Le mot de passe doit contenir au moins 8 caractères.";

		}
						

	}else{
		$errors[] = "Les mots de passe doivent être identiques.";
	}

	if (empty($errors)){
		$accountManager = new \projet8\accountManager();

		// hash password
		$password = password_hash($password, PASSWORD_BCRYPT);
		// modify password in database				
		$accountManager->modifyPassword($password, $email);
		// delete recovery request 				
		$recovery->delRequest($email);
		// find accound name with email				
		$account = $accountManager->getAccountWithEmail($email);
		// create session 				
		$accountManager->createSession($password, $account->accountName);
						
		listPosts();
	}else{
		require('view/recoveryView.php');	
	}
}
