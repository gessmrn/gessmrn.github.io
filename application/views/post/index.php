<div class="container">
	<div class="row">
		<div class="col-md-4 d-flex justify-content-between">
			<br>
	    	<h1>Kumpulan Drama Korea Terbaru!</h1>
	    	<br>
	    	<br>
	    	<a href="<?= base_url() ?>post/tambah" class="btn btn-primary align-self-end">Tambah Postingan</a>
		</div>
		<div class="col-md-8 align-self-end">
			<?= $this->pagination->create_links(); ?>
		</div>
	</div>
	<hr>
	<div class="row mt-3">
		<?php foreach ($posts as $post) : ?>
			<div class="col-md-4 mb-3">
				<h3 class="text-truncate"><?= $post['judul']; ?></h3>
				<p style="-webkit-line-clamp:3; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-box-orient:vertical;"><?= $post['isi']; ?></p>
				<a href="<?= base_url(); ?>/post/Kumpulan Drama Korea Terbaru!<?= $post['judul']; ?>" class="btn btn-primary">Lihat &raquo;</a>
				<a role="button" href="<?=base_url() ?>post/update/<?= $post['id_post'] ?>" class="btn btn-success">Update</a>
				<a href="<?= base_url() ?>post/hapus/<?= $post['id_post'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus postingan?')">Hapus</a>
				<hr>
			</div> 
		<?php endforeach; ?>
	</div>
</div>