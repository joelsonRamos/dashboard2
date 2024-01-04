<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">
			<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="../../assets/img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Usuário'; ?></span>
                </a>
				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="index.php?logout=1">Log out</a>
				</div>
			</li>
		</ul>
    </div>
</nav>