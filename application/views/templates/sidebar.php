<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Gallery ME</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url('admin')?>">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url('profile')?>">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url('admin/register')?>">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Admin Register</span>
            </a>
					</li>

                    <li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url('auth/logout')?>">
              <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Log Out</span>
            </a>
					</li>
			</div>
		</nav>