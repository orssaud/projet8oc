<?php 
namespace projet8;

class chapterManager extends \projet8\dataBase
{

	public function listPosts(){

		$posts = $this->query('SELECT id, title, content, chapter_date FROM chapter ORDER BY chapter_date DESC');
			

		return $posts;

	}

	public function onePost($id){
			$post = $this->prepare('SELECT id, title, content, chapter_date FROM chapter WHERE id = ?', [$id], true);

			return $post;
	}


	
	public function saveChapter($title,$chapter){
		$post = $this->prepare('INSERT INTO chapter(title, chapter_date, content) VALUES(?, NOW(), ?)', [$title,$chapter]);
		return $post;

	}
	public function deleteChapter($id){
		$post = $this->prepare('DELETE FROM `chapter`
						WHERE `id` = ?',
						 [$id]);
		return $post;
	}
	public function editChapter($id){
		$post = $this->prepare('SELECT id, title, content, chapter_date FROM chapter WHERE id = ?', [$id], true);
		return $post;
	}
	public function updateChapter($title, $chapter, $id){
			$post = $this->prepare('	UPDATE chapter
							SET title = ?,
							  content = ?
							WHERE id = ?', 
							[$title, $chapter, $id]);
			return $post;
	}
}