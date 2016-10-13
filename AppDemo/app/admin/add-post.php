<?php //include config
require_once('../includes/config.php');

require('layout/header.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
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
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">

	<h1>Blog Admin</h1>
	<div class='clear'></div>
	<hr />

	<h2>Add Blog Post</h2>
	<?php

		//if form has been submitted process it
		if(isset($_POST['submit'])){

			$_POST = array_map( 'stripslashes', $_POST );

			//collect form data
			extract($_POST);

			//very basic validation
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
					$stmt = $db->prepare('INSERT INTO blog_posts (postTitle,postDesc,postCont,postDate) VALUES (:postTitle, :postDesc, :postCont, :postDate)') ;
					$stmt->execute(array(
						':postTitle' => $postTitle,
						':postDesc' => $postDesc,
						':postCont' => $postCont,
						':postDate' => date('Y-m-d H:i:s')
					));

					//Only use on Linux Server, Windows will not work with ReRwrite
					/*$postSlug = slug($postTitle);
					
					$stmt = $db->prepare('INSERT INTO blog_posts (postTitle,postSlug,postDesc,postCont,postDate) VALUES (:postTitle, :postSlug, :postDesc, :postCont, :postDate)') ;
					$stmt->execute(array(
						':postTitle' => $postTitle,
						':postSlug' => $postSlug,
						':postDesc' => $postDesc,
						':postCont' => $postCont,
						':postDate' => date('Y-m-d H:i:s')
					));*/

					//redirect to index page
					header('Location: index.php?action=added');
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

	<form action='' method='post' role="form">

		<div class="form-group">
			<p></p><label>Title</label><br />
				<input type='text' name='postTitle' class="form-control" value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'>
			</p>
		</div>

		<div class="form-group">
			<p><label>Description</label><br />
				<textarea name='postDesc' cols='60' rows='10' class="form-control">
					<?php if(isset($error)){ echo $_POST['postDesc'];}?>
				</textarea>
			</p>
		</div>

		<div class="form-group">
			<p><label>Content</label><br />
				<textarea name='postCont' cols='60' rows='10' class="form-control">
					<?php if(isset($error)){ echo $_POST['postCont'];}?>
				</textarea>
			</p>
		</div>

		<p><input class="btn btn-lg btn-success btn-md" type='submit' name='submit' value='Submit'></p>

	</form>

</div>

<?php
	include("layout/footer.php");
?>