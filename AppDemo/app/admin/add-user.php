<?php //include config
require_once('../includes/config.php');

require('layout/header.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add User</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="users.php">User Admin Index</a></p>

	<h2>Add User</h2>

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		//collect form data
		extract($_POST);

		//very basic validation
		if($username ==''){
			$error[] = 'Please enter the username.';
		}

		if($password ==''){
			$error[] = 'Please enter the password.';
		}

		if($passwordConfirm ==''){
			$error[] = 'Please confirm the password.';
		}

		if($password != $passwordConfirm){
			$error[] = 'Passwords do not match.';
		}

		if($email ==''){
			$error[] = 'Please enter the email address.';
		}

		if(!isset($error)){

			$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

			try {

				//insert into database
				$stmt = $db->prepare('INSERT INTO blog_members (username,password,email) VALUES (:username, :password, :email)') ;
				$stmt->execute(array(
					':username' => $username,
					':password' => $hashedpassword,
					':email' => $email
				));

				//redirect to index page
				header('Location: users.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form class="form-horizontal" role="form" action='' method='post'>
		<div class="form-group">
			<label class="col-lg-3 control-label">Username:</label>
			<div class="col-lg-8">
				<input class="form-control" type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">Password:</label>
			<div class="col-lg-8">
				<input class="form-control" type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">Confirm Password:</label>
			<div class="col-lg-8">
				<input class="form-control" type='password' name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-3 control-label">Email:</label>
			<div class="col-lg-8">
				<input class="form-control" type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label"></label>
			<div class="col-md-8">
				<input class="btn btn-primary" type='submit' name='submit' value='Add User'>
				<span></span>
				<input class="btn btn-default" value="Cancel" type="reset">
			</div>
		</div>
	</form>

</div>
<?php
	require('layout/footer.php');
?>

