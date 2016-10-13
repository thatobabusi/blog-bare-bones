<?php
//include config
require_once('../includes/config.php');

require('layout/header.php');

//check if already logged in
if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4"><h1>Amin Login</h1><hr>
				<?php

				//process login form if submitted
				if(isset($_POST['submit'])){

					$username = trim($_POST['username']);
					$password = trim($_POST['password']);

					if($user->login($username,$password)){

						//logged in return to index page
						header('Location: index.php');
						exit;


					} else {
						$message = '<p class="error">Wrong username or password</p>';
					}

				}//end if submit

				if(isset($message)){ echo $message; }
				?>
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Please Sign In</h3>
					</div>

					<div class="panel-body">
						<p style="text-align: justify">This section of the website is for Authorized users only.
							<br/>If you do not have Admin previleges please use the
							<a href="../login.php">Public Login</a> instead.
						</p>
						<form role="form" action="" method="post">
							<fieldset>
								<div class="form-group">
									<img src="images/admin.jpg" class="img-rounded" alt="admin" width="304" height="150">
									<input class="form-control" placeholder="Username" name="username" type="text" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
								</div>

								<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Login"  />
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	include("layout/footer.php");
?>
