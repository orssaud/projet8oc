<?php

class postManager extends dataBase
{

	public function listPosts(){

		$posts = $this->query('SELECT id, title, content, chapter_date FROM chapter ORDER BY chapter_date DESC LIMIT 0, 5');
			

		return $posts;

	}

	public function onePost($id){
			$post = $this->prepare('SELECT id, title, content, chapter_date FROM chapter WHERE id = ?', [$id], true);

			return $post;
	}
}