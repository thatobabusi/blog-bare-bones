<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)){ echo $title; }?></title>
    <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
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
                <li><a href='index.php'>Mangage Blog Posts</a></li>
                <li><a href='users.php'>Manage Users</a></li>
                <li><a href="../" ><span class="glyphicon glyphicon-globe"></span> View Website</a></li>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!$user->is_logged_in()){  ?>
                            <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php } else { ?>
                            <li disabled="disabled"><a href="#" disabled="disabled"><span class="glyphicon glyphicon-user"></span> Logged in as Admin<?php //echo $_SESSION['username']; ?></a></li>
                            <li><a href='logout.php'><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    <?php } ?>
                </ul>
            </ul>
        </div>
    </div>
</nav>
