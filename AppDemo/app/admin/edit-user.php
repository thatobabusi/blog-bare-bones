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
  <title>Admin - Edit User</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="wrapper">

	<h1>Blog Admin</h1>
	<div class='clear'></div>
	<hr />

	<h2>Edit Blog Users</h2>

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		//collect form data
		extract($_POST);

		//very basic validation
		if($username ==''){
			$error[] = 'Please enter the username.';
		}

		if( strlen($password) > 0){

			if($password ==''){
				$error[] = 'Please enter the password.';
			}

			if($passwordConfirm ==''){
				$error[] = 'Please confirm the password.';
			}

			if($password != $passwordConfirm){
				$error[] = 'Passwords do not match.';
			}

		}
		

		if($email ==''){
			$error[] = 'Please enter the email address.';
		}

		if(!isset($error)){

			try {

				if(isset($password)){

					$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

					//update into database
					$stmt = $db->prepare('UPDATE blog_members SET username = :username, password = :password, email = :email WHERE memberID = :memberID') ;
					$stmt->execute(array(
						':username' => $username,
						':password' => $hashedpassword,
						':email' => $email,
						':memberID' => $memberID
					));


				} else {

					//update database
					$stmt = $db->prepare('UPDATE blog_members SET username = :username, email = :email WHERE memberID = :memberID') ;
					$stmt->execute(array(
						':username' => $username,
						':email' => $email,
						':memberID' => $memberID
					));

				}
				

				//redirect to index page
				header('Location: users.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {
			$stmt = $db->prepare('SELECT memberID, username, email FROM blog_members WHERE memberID = :memberID') ;
			$stmt->execute(array(':memberID' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>
	
</div>

<div class="container">
	<div class="row well" style="background-color: #ffffff;">
		<div class="col-md-12">
				<h1><?php echo $row['username'];?>'s Profile</h1>
				<hr>
			<br><br><br>
			<ul class="nav nav-tabs" id="myTab">
				<li class="active"><a href="#logindetails" data-toggle="tab"><i class="fa fa-envelope-o"></i> Login Details</a></li>
				<li><a href="#blogposts" data-toggle="tab"><i class="fa fa-reply-all"></i> Blog Posts</a></li>
				<li><a href="#messages" data-toggle="tab"><i class="fa fa-file-text-o"></i> Messages</a></li>
			</ul>

			<div class="tab-content">

				<div class="tab-pane active" id="logindetails">
					<a type="button" data-toggle="collapse" data-target="#a1">
						<form class="form-horizontal" role="form" action='' method='post'>
							<div class="form-group">
								<input class="form-control"type='hidden' name='id' value='<?php echo $row['memberID'];?>'>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Username:</label>
								<div class="col-lg-8">
									<input class="form-control" type='text' name='username' value='<?php echo $row['username'];?>'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Password:</label>
								<div class="col-lg-8">
									<input class="form-control" type='password' name='password' value=''>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Confirm Password:</label>
								<div class="col-lg-8">
									<input class="form-control" type='password' name='passwordConfirm' value=''>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Email:</label>
								<div class="col-lg-8">
									<input class="form-control" type='text' name='email' value='<?php echo $row['email'];?>'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<div class="col-md-8">
									<input class="btn btn-primary" type='submit' name='submit' value='Update User Details'>
									<span></span>
									<input class="btn btn-default" value="Cancel" type="reset">
								</div>
							</div>
						</form>
					</a>
					<br>
				</div>

				<div class="tab-pane" id="blogposts">
					<a type="button" data-toggle="collapse" data-target="#s1">
						Pending 1
					</a>
					<br>
				</div>

				<div class="tab-pane" id="messages">
					<a type="button" data-toggle="collapse" data-target="#s1">
						Pending 2
					</a>
				</div>

			</div>

		</div>
	</div>


</div>


<?php
	require('layout/footer.php');
?>
