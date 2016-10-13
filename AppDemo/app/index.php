<?php
    $title = 'Home';
    require('includes/config.php');

    //include header template
    require('layout/header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

<div id="wrapper">
    <!--<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/banners/Barbas_aKING_20_03_2014.jpg" alt="Barbas_aKING">
            </div>
            <div class="item">
                <img src="images/banners/Barbas_FVC_14_03_2014.jpg" alt="Barbas_FVC">
            </div>
            <div class="item">
                <img src="images/banners/Barbas_ladies_01_2014.jpg" alt="Barbas_ladies">
            </div>
            <div class="item">
                <img src="images/banners/Barbas_Phuza_02_2014.jpg" alt="Barbas_Phuza">
            </div>
            <div class="item">
                <img src="images/banners/Barbas_SIP_Karee_12_03_2014.jpg" alt="Barbas_SIP_Karee">
            </div>
            <div class="item">
                <img src="images/banners/Barbas_SIP_Soetdoring_17_03_2014.jpg" alt="Barbas_SIP_Soetdoring">
            </div>
            <div class="item">
                <img src="images/banners/Barbas_VCK_12_04_2014.jpg" alt="Barbas_VCK">
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>-->
    <div id='main'>

        <h1>Blog</h1>
        <hr />

        <?php
        try {

            $stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
            while($row = $stmt->fetch()){

                echo '<div>';
                echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
                //Use only on Linux server the Windows one will not work
                //echo '<h1><a href="viewpost.php?id='.$row['postSlug'].'">'.$row['postTitle'].'</a></h1>';
                echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
                echo '<p>'.$row['postDesc'].'</p>';
                echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';
                //Use only on Linux server the Windows one will not work
                //echo '<p><a href="viewpost.php?id='.$row['postSlug'].'">Read More</a></p>';
                echo '</div>';

            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        ?>
    </div>


    <div id='sidebar'>
        <!--<div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>

            <div class="panel-body">
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
        </div>-->
        <h1>Recent Posts</h1>
        <hr/>
        <ul>
            <li><a href="the-cyber-house-rules">The Cyber House Rules</a></li>
            <li><a href="how-hermes-requistioned-his-groove-back">How Hermes Requisitioned His Groove Back</a></li>
            <li><a href="that-darn-katz">That Darn Katz!</a></li>
            <li><a href="bendless-love">Bendless Love</a></li>
        </ul>
        <h1>Catgories</h1>
        <hr/>
        <ul>
            <li><a href="c-test">test</a></li><li><a href="c-new">New</a></li><li><a href="c-git">GIT</a></li><li><a href="c-php">PHP</a></li><li><a href="c-tech">tech</a></li></ul>
        <h1>Archives</h1>
        <hr/>
        <ul>
            <li><a href='a-6-2013'>June</a></li><li><a href='a-5-2013'>May</a></li></ul> </div>
    <div id='clear'></div>
</div>
<div id='clear'></div>
<?php
    //include footer template
    require('layout/footer.php');
?>