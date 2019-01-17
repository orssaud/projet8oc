<?php
session_start();

require('controller/controller.php');


try{

	if (isset($_GET['action'])) {

	    if ($_GET['action'] == 'listPosts') {
	    	if (isset($_SESSION['id']) && isset($_SESSION['account'])){
				logged();
			}
			else{
				listPosts();
			}
	        
	    }
	    elseif ($_GET['action'] == 'post') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            post($_GET['id']);
	        }
	        else {
	             throw new Exception('Aucun identifiant de billet envoyé');
	        }
	    }
	    elseif ($_GET['action'] == 'addComment') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
	            	if(isset($_POST['comId'])){
	            		addComment($_GET['id'], $_POST['author'], $_POST['comment'], $_POST['byAuthor'], $_POST['comId']);
	            	}else{
	            		addComment($_GET['id'], $_POST['author'], $_POST['comment'], $_POST['byAuthor'], null);
	            	}
	                
	            }
	            else {
	                throw new Exception('Tous les champs ne sont pas remplis');
	            }
	        }
	        else {
	            throw new Exception('Aucun identifiant de billet envoyé');
	        }
	    }
	    else if ($_GET['action'] == 'password'){

			password();

		}else if ($_GET['action'] == 'sendPassword'){
			
			if (isset($_POST['email'])){
				passwordRecovery($_POST['email']);
			
			}else{
				$errors[] = "vous n'avez pas entrer d'email";
				password($errors);


			}

		}else if ($_GET['action'] == 'recovery'){

			recovery();
			//$_POST['email'], $_POST['key']

		}else if ($_GET['action'] == 'newPassword'){

			if (isset($_POST['email']) && isset($_POST['key']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){
				newPassword($_POST['email'], $_POST['key'], $_POST['password'], $_POST['confirmPassword']);
			}else{
				recovery();
			}
			
			//$_POST['password'], $_POST['confirmPassword']

		}
	    elseif ($_GET['action'] == 'login'){    
		    if (isset($_POST['password']) && isset($_POST['account'])){ 

				connect($_POST['account'], $_POST['password']);
					
				
			}else{
				login();
			}
		}
		elseif ($_GET['action'] == 'save'){
			if (isset($_SESSION['id']) && isset($_SESSION['account'])){
				if (isset($_POST['text'])){ // add title cheker
					saveChapter($_POST['title'], $_POST['text']);
				}
				else{
					throw new Exception('Aucun contenu à sauvegarder');
				}
			}
			else{
				listPosts();
			}
		}
		elseif ($_GET['action'] == 'newChapter'){
			if (isset($_SESSION['id']) && isset($_SESSION['account'])){
				newChapter();
			}
			else{
				listPosts();
			}
		}
		elseif ($_GET['action'] == 'disconect'){
			destroySession();
			
		}
		elseif ($_GET['action'] == 'edit'){
			if (isset($_SESSION['id']) && isset($_SESSION['account'])){
				editChapter();
			}
			else{
				listPosts();
			}
		}
		elseif ($_GET['action'] == 'editSave'){
			if (isset($_SESSION['id']) && isset($_SESSION['account'])){
				if (isset($_POST['text'])){ // add title cheker

					saveEdit($_POST['title'], $_POST['text'], $_POST['id']);
				}
				else{
					throw new Exception('Aucun contenu à sauvegarder');
				}
			}
			else{
				listPosts();
			}
		}
		elseif ($_GET['action'] == 'reported') {
	        //var_dump($_GET['id']);
	         //var_dump($_POST['idComment']);
	         report($_GET['id'], $_POST['idComment']);
	    }
	    elseif ($_GET['action'] == 'allComments'){
			if (isset($_SESSION['id']) && isset($_SESSION['account'])){
				//allComments();
				if (isset($_GET['p'])){
					if ($_GET['p'] == 1){
						//require 'comments/all.php';
						getAllComments();
					}elseif($_GET['p'] == 2){
						//require 'comments/reported.php';
						getReportedComments();
					}else{
						//require 'comments/new.php';

						getNewComments();
					}

				}
					else{
						//require 'comments/new.php';

						getNewComments();
					}

			}

			else{
				listPosts();
			}
		}
		elseif ($_GET['action'] == 'deleteChapter'){
			if (isset($_SESSION['id']) && isset($_SESSION['account'])){
				deleteChapter($_GET['id']);
			}
			else{
				listPosts();
			}
		}
		elseif ($_GET['action'] == 'deleteComment'){
			if (isset($_SESSION['id']) && isset($_SESSION['account'])){
				deleteComment($_GET['id'],$_GET['p']);
			}
			else{
				listPosts();
			}
		}
		elseif ($_GET['action'] == 'deleteCommentPost'){
			if (isset($_SESSION['id']) && isset($_SESSION['account'])){
				deleteCommentPost($_GET['id'],$_GET['postId']);
			}
			else{
				listPosts();
			}
		}
		else{
			listPosts();
		}
	}
	else {
		
			listPosts();
		
	    
	}
}
catch(Exception $e){
	
	require('view/error.php');
}