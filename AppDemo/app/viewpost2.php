<?php require('includes/config.php');

$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));

//Use only on Linux server the Windows one will not work
//$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postSlug  = :postSlug ');
//$stmt->execute(array(':postSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
    header('Location: ./');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['postTitle'];?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
<?php
    include('layout/header.php');
?>
<div id="wrapper">
    <div id='main'>
        <h1>Single Blog Post</h1>
        <hr />
        <p><a href="./">Blog Index</a></p>


        <?php
        echo '<div>';
        echo '<h1>'.$row['postTitle'].'</h1>';
        echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
        echo '<p>'.$row['postCont'].'</p>';
        echo '</div>';
        ?>
    </div>

    <div id='sidebar'>
        <h1>Recent Posts</h1>
        <hr />

        <ul>
            <?php echo "still working";
/*            $stmt = $db->query('SELECT postTitle, postSlug FROM blog_posts ORDER BY postID DESC LIMIT 5');
            while($row = $stmt->fetch()){
                echo '<li><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></li>';
            }
            */?>
        </ul>

        <h1>Catgories</h1>
        <hr />

        <ul>
            <?php echo "still working";
/*            $stmt = $db->query('SELECT catTitle, catSlug FROM blog_cats ORDER BY catID DESC');
            while($row = $stmt->fetch()){
                echo '<li><a href="c-'.$row['catSlug'].'">'.$row['catTitle'].'</a></li>';
            }
            */?>
        </ul>

        <ul>
            <?php
            /*$stmt = $db->query("SELECT Month(postDate) as Month, Year(postDate) as Year FROM blog_posts_seo GROUP BY Month(postDate), Year(postDate) ORDER BY postDate DESC");
            while($row = $stmt->fetch()){
                $monthName = date("F", mktime(0, 0, 0, $row['Month'], 10));
                $slug = 'a-'.$row['Month'].'-'.$row['Year'];
                echo "<li><a href='$slug'>$monthName</a></li>";
            }*/
            ?>
        </ul>

    <div id='clear'></div>
</div>
<?php
    include('layout/footer.php');
?>