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
								<h1 class="h2">Get started</h1>
								<p class="lead">
									Start creating the best possible user experience for you customers.
								</p>
							</div>

							<div class="card">
								<div class="card-body">
									<div class="m-sm-3">
										<form action="/dashboard/controllers/RegisterController.php" method="post">
											
											<!-- <?php include('/config/errors.php'); ?> -->
											<div class="mb-3">
												<label class="form-label">Username</label>
												<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your name" value="" required/>
											</div>
											<div class="mb-3">
												<label class="form-label">Email</label>
												<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" value="" required/>
											</div>
											<div class="mb-3">
												<label class="form-label">Password</label>
												<input class="form-control form-control-lg" type="password" name="password_1" placeholder="" required/>
											</div>
											<div class="mb-3">
												<label class="form-label">Confirm password</label>
												<input class="form-control form-control-lg" type="password" name="password_2" placeholder="" required/>
											</div>
											<div class="d-grid gap-2 mt-3">
												<!-- <a href="index.html" class="btn btn-lg btn-primary">Sign up</a> -->
												<button type="submit" class="btn btn-lg btn-primary" name="reg_user">Register</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="text-center mb-3">
								Already have account? <a href="../login/index.php">Log In</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>