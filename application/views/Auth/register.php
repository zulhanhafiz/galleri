<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Daftar Akun</h1>
							<p class="lead">Silahkan Daftar Akun Terlebih Dahulu</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form method="post" action="<?= base_url('auth/register')?>">
										<div class="mb-3">
											<label class="form-label">Nama Lengkap</label>
											<input class="form-control form-control-lg" type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap anda" value="<?= set_value('nama_lengkap')?>"/>
                                            <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>');?>
										</div>
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Masukkan Username anda" value="<?= set_value('username')?>"/>
                                            <?= form_error('username', '<small class="text-danger">', '</small>');?>
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Masukkan Email anda" value="<?= set_value('email')?>"/>
                                            <?= form_error('email', '<small class="text-danger">', '</small>');?>
										</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input class="form-control form-control-lg" type="password" name="password1" placeholder="Masukkan Password anda"/>
                                                    <?= form_error('password1', '<small class="text-danger">', '</small>');?>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Ketik ulang Password</label>
                                                    <input class="form-control form-control-lg" type="password" name="password2" placeholder="Ketik ulang Password anda"/>
                                                </div>
                                            </div>
                                        </div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Sign up</a>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Sudah Punya Akun? <a href="<?= base_url('auth/proses_login')?>">Masuk</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>