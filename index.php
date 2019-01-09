<?php
session_start();

require('controller/controller.php');



if (isset($_GET['action'])) {

    if ($_GET['action'] == 'listPosts') {
    	if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
			logged();
		}
		else{
			listPosts();
		}
        
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'login'){    
	    if (isset($_POST['password']) && isset($_POST['account'])){ 
			if(connect($_POST['account'], $_POST['password'])) {
				
				        logged($_POST['account']);
				       
			}
			else {
				 echo 'Mauvais identifiant ou mot de passe !';
				login();
			}
		}
		else{
			login();
		}
	}
	elseif ($_GET['action'] == 'save'){
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
			if (isset($_POST['text'])){ // add title cheker
				saveChapter($_POST['title'], $_POST['text']);
			}
			else{
				echo "aucun contenu à sauvegarder";
			}
		}
		else{
			listPosts();
		}
	}
	elseif ($_GET['action'] == 'newChapter'){
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
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
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
			editChapter();
		}
		else{
			listPosts();
		}
	}
	elseif ($_GET['action'] == 'editSave'){
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
			if (isset($_POST['text'])){ // add title cheker

				saveEdit($_POST['title'], $_POST['text'], $_POST['id']);
			}
			else{
				echo "aucun contenu à sauvegarder";
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
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
			allComments();
		}
		else{
			listPosts();
		}
	}
	elseif ($_GET['action'] == 'deleteChapter'){
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
			deleteChapter($_GET['id']);
		}
		else{
			listPosts();
		}
	}
	elseif ($_GET['action'] == 'deleteComment'){
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
			deleteComment($_GET['id']);
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
	if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
		logged();
	}
	else{
		listPosts();
	}
    
}
