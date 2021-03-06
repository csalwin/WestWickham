<?php
ini_set('display_errors','1');//TODO remove from deployment
include('../app/controllers/DefaultController.php');

//Creates an Instance of Class Default controller
$data = new app\controllers\DefaultController();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $data->title; ?></title>
<!--For the date picker in Admin Panel-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


    <script src="js/min/modernizr.min.js"></script>
    <link onload="junior_page()"  rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>

</head>

<body>
<div id="page">

    <header>

        <h1><a href="index.php?page=home"><span>West Wickham Underwater Hockey Club</span></a></h1><!-- Logo image -->
        <nav>


            <div id="links">
                <ul>
                    <li id="home_btn"><a href="index.php?page=home">Home</a></li>
                    <li><a href="index.php?page=about">About</a></li>
                    <li><a href="index.php?page=events">Events</a></li>
                    <li><a href="index.php?page=news">News</a></li>
                    <li><a href="index.php?page=squad">Squad</a></li>
                    <li><a href="index.php?page=shop">Shop</a></li>
                    <li><a href="index.php?page=contact">Contact</a></li>
                </ul>

            </div>

            <div id="selector">
                <ul>

                    <li id="elite"><a>Elite</a></li>

                    <li id="junior"><a>Junior</a></li>

                </ul>
            </div>

        </nav>


    </header>


    <div id="content">

        <?php include ('../app/views/'.$data->content.'.phtml'); ?>




        </div>




    <footer>

        <ul>
            <li>
                <a href="index.php?page=terms">Terms & Conditions</a>
                <a href="index.php?page=login">Admin</a>
            </li>
        </ul>


    </footer>

</div><!--End of Page ID-->

<script src="js/min/jquery.min.js"></script>
<script src="js/cycle2/cycle2.js"></script>
<script>

    function junior_page(){
        if (document.title=="West Wickham Underwater Hockey - Junior"){
            document.getElementById("junior").style.display="none";
            document.getElementById("elite").style.display="show";

        }
        else {
            document.getElementById("junior").style.display="show";
            document.getElementById("elite").style.display="none";

        }
    }







</script>

</body>






</html>