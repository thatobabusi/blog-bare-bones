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
  <title>Admin - Edit Post</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | " +
			  "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">

	<h1>Blog Admin</h1>
	<div class='clear'></div>
	<hr />

	<h2>Edit Blog Post</h2>

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postID ==''){
			$error[] = 'This post is missing a valid id!.';
		}

		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('UPDATE blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont WHERE postID = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':postID' => $postID
				));

				//Only use on Linux Server, Windows will not work with ReRwrite
				/*$postSlug = slug($postTitle);

				//insert into database
				$stmt = $db->prepare('UPDATE blog_posts SET postTitle = :postTitle, postSlug = :postSlug, postDesc = :postDesc, postCont = :postCont WHERE postID = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postSlug' => $postSlug,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':postID' => $postID
				));*/


				//redirect to index page
				header('Location: index.php?action=updated');
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

			$stmt = $db->prepare('SELECT postID, postTitle, postDesc, postCont FROM blog_posts WHERE postID = :postID') ;
			$stmt->execute(array(':postID' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post' role="form">
		<input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>

		<div class="form-group">
			<p><label>Title</label><br />
			<input type='text' name='postTitle' class="form-control" value='<?php echo $row['postTitle'];?>'></p>
		</div>
		<div class="form-group">
			<p><label>Slug</label><br />
				<input type='text' name='postSlug' class="form-control" value='<?php //echo $row['postSlug'];?>'></p>
		</div>
		<div class="form-group">
			<p><label>Description</label><br />
			<textarea name='postDesc' cols='60' rows='10' class="form-control"><?php echo $row['postDesc'];?></textarea></p>
		</div>
		<div class="form-group">
			<p><label>Content</label><br />
			<textarea name='postCont' cols='60' rows='10' class="form-control"><?php echo $row['postCont'];?></textarea></p>
		</div>

		<p><input class="btn btn-lg btn-success btn-md" type='submit' name='submit' class="btn btn-default" value='Update'></p>


	</form>

</div>

<?php
	require('layout/footer.php');
?>
