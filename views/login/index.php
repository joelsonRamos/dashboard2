<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<?php include('../common/head.php') ?>

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
										<form action="/dashboard/controllers/LoginController.php" method="post">
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
								Don't have an account? <a href="../register/index.php">Sign up</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>

</html>