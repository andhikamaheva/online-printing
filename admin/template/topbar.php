<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-3 col-md-2">
				<a href="./">Online Printing</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-9 col-md-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<a href="#" class="show-sidebar">
						  <i class="fa fa-bars"></i>
						</a>
						<div id="search">
							<input type="text" placeholder="search"/>
							<i class="fa fa-search"></i>
						</div>
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="hidden-xs">
								<a href="./" class="modal-link">
									<i class="fa fa-sign-in"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="hidden-xs">
								<a class="ajax-link" href="content/calendar.php">
									<i class="fa fa-money"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="img/profile.png" class="img-rounded" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Selamat Datang,</span>
										<span id="admin_name"><?php echo $_SESSION['admin']['admin_name']; ?></span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">
											<i class="fa fa-user"></i>
											<span>Profil</span>
										</a>
									</li>
									<li>
										<a href="ajax/page_messages.html" class="ajax-link">
											<i class="fa fa-envelope"></i>
											<span>Pesan</span>
										</a>
									</li>
									<li>
										<a href="ajax/gallery_simple.html" class="ajax-link">
											<i class="fa fa-picture-o"></i>
											<span>Album</span>
										</a>
									</li>
									<li>
										<a href="ajax/calendar.html" class="ajax-link">
											<i class="fa fa-tasks"></i>
											<span>Agenda</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-cog"></i>
											<span>Pengaturan</span>
										</a>
									</li>
									<li>
										<a href="handler/logout_handler.php">
											<i class="fa fa-power-off"></i>
											<span>Keluar</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
