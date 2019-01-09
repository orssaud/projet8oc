<?php
namespace projet8;

class postManager extends \projet8\dataBase
{

	public function listPosts(){

		$posts = $this->query('SELECT id, title, content, chapter_date FROM chapter ORDER BY chapter_date DESC');
			

		return $posts;

	}

	public function onePost($id){
			$post = $this->prepare('SELECT id, title, content, chapter_date FROM chapter WHERE id = ?', [$id], true);

			return $post;
	}
}