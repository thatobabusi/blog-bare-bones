<?php
require('includes/config.php');

//define page title
$title = 'Home';

//include header template
require('layout/header.php');

$verification_body = $_REQUEST["body"];

?>
    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
<?php
    echo $verification_body;
?>
            </div>
        </div>
    </div>
<?php

//include footer template
require('layout/footer.php');