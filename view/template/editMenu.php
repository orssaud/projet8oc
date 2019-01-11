<div class="container">
	<div class="row justify-content-lg-end">
		
		<div class="col-lg-auto ">
			<form action="index.php?action=edit&amp;id=<?= $post->id ?>" method="post">
				<button type="submit" class="btn btn-info"><i class="fas fa-pencil-alt"></i> Modifier</button>
			</form>
		</div>
		<div class="col-lg-auto ">
			<form action="index.php?action=deleteChapter&amp;id=<?= $post->id ?>" method="post">
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</button>
			</form>
		</div>
	</div>
</div>