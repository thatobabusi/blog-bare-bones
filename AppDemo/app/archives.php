<?php require('includes/config.php');
/**
 * Created by PhpStorm.
 * User: THATOS LAPTOP
 * Date: 5/20/2016
 * Time: 1:31 PM
 */

//collect month and year data
$month = $_GET['month'];
$year = $_GET['year'];

//set from and to dates
$from = date('Y-m-01 00:00:00', strtotime("$year-$month"));
$to = date('Y-m-31 23:59:59', strtotime("$year-$month"));

$stmt = $db->prepare('SELECT postID, postTitle, postSlug, postDesc, postDate FROM blog_posts_seo WHERE postDate >= :from AND postDate <= :to ORDER BY postID DESC');
$stmt->execute(array(
    ':from' => $from,
    ':to' => $to
));