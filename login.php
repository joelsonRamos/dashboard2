<?php
	include('config/config.php');
	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<?php include('common/head.php') ?>

	</head>

	<body>
		<main class="d-flex w-100">
			<div class="container d-flex flex-column">
				<div class="row vh-100">
					<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
						<div class="d-table-cell align-middle">

							<div class="text-center mt-4">
								<h1 class="h2">Seja Bem vindo!!!</h1>
								<p class="lead">
								</p>
							</div>

							<div class="card">
								<div class="card-body">
									<div class="m-sm-3">
										<form method="post" action="">
											<?php include('config/errors.php'); ?>
											<div class="mb-3">
												<label class="form-label">Usuário</label>
												<input class="form-control form-control-lg" type="text" name="username"
													placeholder="Enter username" />
											</div>
											<div class="mb-3">
												<label class="form-label">Password</label>
												<input class="form-control form-control-lg" type="password" name="password"
													placeholder="Enter your password" />
											</div>
											<div>
												<div class="form-check align-items-center">
													<input id="customControlInline" type="checkbox" class="form-check-input"
														value="remember-me" name="remember-me" checked>
													<label class="form-check-label text-small"
														for="customControlInline">Remember me</label>
												</div>
											</div>
											<div class="d-grid gap-2 mt-3">
												<button type="submit" name="login_user" class="btn btn-lg btn-primary">Sign
													in</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="text-center mb-3">
								Don't have an account? <a href="register.php">Sign up</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>

</html>