<?php

//require('model/model.php');
require_once('model/dataBase.php'); 
require_once('model/chapterManager.php');
require_once('model/commentsManager.php');
//require_once('model/chapterManager.php');
require_once('model/accountManager.php');
require_once('model/recoveryManager.php');

require_once('lib/relativeTime.php');
require_once('lib/rand.php');

/* --------------------------------------------
					POSTS
----------------------------------------------*/
function listPosts()
{
	$chapterManager = new \projet8\chapterManager();
	$posts = $chapterManager->listPosts();

	require('view/listPostsView.php');
}

/* --------------------------------------------
				ONLY ONE POST
----------------------------------------------*/
function post($id)
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
					COMMENT
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
function getNewCommentsNumber()
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
	$commentsManager = new \projet8\commentsManager();
	$commentsManager->deleteComment($id);

	if($p == 1){
		getAllComments();
	}elseif($p ==2){
		getReportedComments();
	}else{
		getNewComments();
	}

}
function deleteCommentPost($id, $postId)
{
	$commentsManager = new \projet8\commentsManager();
	$commentsManager->deleteComment($id);

post($postId);

}
function deleteComments($id) // chapter id
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
	require('view/newChapter.php');
}

function editChapter(){

	$chapterManager = new \projet8\chapterManager();
	$post = $chapterManager->editChapter($_GET['id']);
	require('view/editChapter.php');
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
	require('view/password.php');
}
function passwordRecovery($email){
	//var_dump($email);
//	$email = 'test@yahoo.fr';
	if (filter_var($email, FILTER_VALIDATE_EMAIL)){
		$accountManager = new \projet8\accountManager();
		$req = $accountManager->accountEmail($email);
	
		if (isset($req->email ) && $req->email == $email){
			$rnd = new \projet8\rand();
			$key = $rnd->randStr(8);

			$recovery = new \projet8\recovery();
			//$req = $recovery->newRecovery($email, $key);

				if ($recovery->newRecovery($email, $key)){
					require('var/mail.php');
					mail($email , $objet, utf8_decode($mail) );
					$successes[] = 'Un email de récupération de mot de passe vous a été envoyé.';
				}else{
					
					$successes[] = 'Un email de récupération de mot de passe vous a déjà été envoyé il y a moins de 5 minutes.';
				}
			
			require('view/password.php');
			
		}else{
			$errors[] = "L'email n'est pas valide.";
			require('view/password.php');
		}
		


	}else{
		$errors[] = "L'email n'est pas valide.";
		require('view/password.php');
	}

}

function recovery(){

	require('view/recovery.php');
}



function newPassword($email, $key, $password, $confirmPassword){

	
		$recovery = new \projet8\recovery();
		$req = $recovery->accountInfo($email);

		if($req){

			if ($req->email === $email ){
				
				if (!password_verify($key, $req->security_key)){
					
					$errors[] = "La clé n'est pas valide.";

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

						$password = password_hash($password, PASSWORD_BCRYPT);
						
						$accountManager->modifyPassword($password, $email);
						
						$recovery->delRequest($email);
						
						$account = $accountManager->getAccountWithEmail($email);
						
						$accountManager->createSession($password, $account->accountName);
						
						listPosts();
	}else{
		require('view/recovery.php');	
	}
}
