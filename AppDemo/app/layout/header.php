<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)){ echo $title; }?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,900,500italic,300italic,300' rel='stylesheet' type='text/css'>
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <!-- Main Style Sheet -->
    <link rel="stylesheet" href="css/core/core.css">
    <?php
        $site_status = "development";
    ?>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                Demo
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <!--<li><a href="#">home</a></li>
                <li><a href="#">about us</a></li>
                <li><a href="#">events</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">specials</a></li>
                <li><a href="#">contact</a></li>-->
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!$user->is_logged_in()){  ?>
                            <li><a href="public/index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <li><a href="admin/login.php"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
                    <?php } else { ?>
                            <li><a href='admin/index.php'><span class="glyphicon glyphicon-list-alt"></span> Admin (Logged in)</a></li>
                            <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> <?php //echo $_SESSION['username']; ?></a></li>
                            <li><a href='admin/logout.php'><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    <?php } ?>
                </ul>
            </ul>
        </div>
    </div>
</nav>

<div id="wrapper">
    <h2>
        THATO BABUSI
    </h2>
</div>