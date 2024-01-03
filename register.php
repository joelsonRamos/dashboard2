
<?php
	include('config/config.php');

	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
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
								<h1 class="h2">Get started</h1>
								<p class="lead">
									Start creating the best possible user experience for you customers.
								</p>
							</div>

							<div class="card">
								<div class="card-body">
									<div class="m-sm-3">
										<form method="post" action="register.php">
											<?php include('config/errors.php'); ?>
											<div class="mb-3">
												<label class="form-label">Username</label>
												<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your name" value="<?php echo $username; ?>"/>
											</div>
											<div class="mb-3">
												<label class="form-label">Email</label>
												<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>"/>
											</div>
											<div class="mb-3">
												<label class="form-label">Password</label>
												<input class="form-control form-control-lg" type="password" name="password_1" placeholder="" />
											</div>
											<div class="mb-3">
												<label class="form-label">Confirm password</label>
												<input class="form-control form-control-lg" type="password" name="password_2" placeholder="" />
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
								Already have account? <a href="login.php">Log In</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>