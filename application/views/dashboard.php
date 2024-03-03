				<main class="content">
					<a href="" data-bs-toggle="modal" data-bs-target="#getTambahphoto">
						<button type="button" class="btn btn-primary btn-lg mb-4 btn btn-success"><i class="fa-solid fa-plus"></i>  Add Photo</button>					
					</a>
					<div class="container-fluid p-0">

					<!-- Modal -->
					<div class="modal fade" id="getTambahphoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<?php echo form_open_multipart('dashboard/tambahPhoto'); ?>
							    <div class="col lg">
									<div class="form-group">
										<label for="">Judul Foto</label>
										<input type="text" name="judul_foto" class="form-control" placeholder="Masukkan Describe_photo">
										<?= form_error('judul_foto', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="col lg">
									<div class="form-group">
										<label for="">Describe_photo</label>
										<input type="text" name="describe_photo" class="form-control" placeholder="Masukkan Describe_photo">
										<?= form_error('describe_photo', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="col lg">
									<div class="form-group">
										<label for="">Gambar</label>
										<input type="file" name="userfile" class="form-control" required>										
									</div>
								</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
							<?php echo form_close(); ?>
						</div>
						</div>
					</div>
					</div>
					<!-- <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1> -->
					
					<div class="row text-center">
						<?php foreach( $foto as $f) : ?>
						<div class="col-4 mb-3">
							<a href="" data-bs-toggle="modal" data-bs-target="#getDataPhoto<?= $f['id_photo'] ?>">
								<img src="<?= $f['photo'] ?>" style="width: 200px; height: 120px;" alt="">;
							</a>
						</div>
						<!-- Modal -->
						<div class="modal fade" id="getDataPhoto<?= $f['id_photo'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="getDataPhotoLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="getDataPhotoLabel">Deskripsi</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body text-start">
									<h4><?= $f['judul_foto']?></h4>
									<p><?= $f['describe_photo']?></p>
									<p><?= $f['time_upload']?></p>
									<i class="fa-solid fa-heart"><?= $f['like_post']?></i>
									<div class="comments-container mt-5">
											<div class="comment-box">
												<div class="comment">
													<div class="row">
														<div class="col-3">
															<img src="<?= base_url()?>template/img/avatars/avatar.jpg" alt="User Avatar" class="avatar">
															<div class="comment-content">
																<p><strong><?= $user['username']?></strong></p>													
															</div>
														</div>
														<div class="col-9">
															<div class="add-comment">
																<textarea placeholder="Tambahkan komentar..." class="comment-input form-control"></textarea>
																<button class="btn-post-comment btn btn-success mt-2">Post</button>
															</div>
														</div>
													</div>
												</div>												
											</div>
									</div>

									<div class="row">
										<div class="col-6 text-end offset-6">
											<a href="" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-warning">	<i class="fa-solid fa-heart text-white"><?= $f['like_post']?></i></a>
											<a href="<?= base_url() ?>dashboard/hapusPhoto/<?= $f['id_photo'] ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
										</div>
									</div>
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
								</div>
								</div>
							</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</main>

			<!-- Button trigger modal -->


							

			