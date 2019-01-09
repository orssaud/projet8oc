<?php

class commentsManager extends dataBase
{



	public function commentsForOnePost($id){
			$comments = $this->prepare('SELECT id, author, comment, comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC', [$id]);

			return $comments;
	}

	public function addComment($postId,$author,$comment){
		 $post = $this->prepare('INSERT INTO comments(post_id, author, comment, comment_date, reported) VALUES(?, ?, ?, NOW(), 0)', [$postId,$author,$comment]);
		 return $post;

	}

	public function reported($postId, $commentId){
			$post = $this->prepare('SELECT reported FROM comments WHERE id = ?', [$commentId], true);
	
	$repotedNum = intval($post->reported);
	$repotedNum ++;


	$post = $this->prepare('	UPDATE comments
							SET reported = ?
							WHERE id = ?', 
							[$repotedNum, $commentId]);
	return $post;
 
	}

	public function deleteComments($id){
		$this->prepare('DELETE FROM `comments`
						WHERE `post_id` = ?',
						 [$id]);
	}
	public function deleteComment($id){
		$this->prepare('DELETE FROM `comments`
						WHERE `id` = ?',
						 [$id]);
	}
	public function getReportedComments(){
		$posts = $this->query('SELECT *
						FROM comments
						WHERE reported >= 1
						ORDER BY reported DESC');
		return $posts;
	}
	public function getAllComments(){
		$posts = $this->query('SELECT *
						FROM comments
						ORDER BY comment_date DESC');
		return $posts;
	}
	public function getNewComments(){
			$logDate =  $_SESSION['lastLogin'];
	

	$posts = $this->prepare('SELECT *
						FROM comments
						WHERE comment_date 
						BETWEEN ? AND NOW()
						ORDER BY comment_date DESC', [$logDate]);
	return $posts;
	}
}
