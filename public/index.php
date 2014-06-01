<?php
include('../app/controllers/DefaultController.php');

//Creates an Instance of Class Default controller
$data = new app\controllers\DefaultController();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $data->title; ?></title>
    <script src="js/min/modernizr.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
</head>

<body onload="junior_page()">
<div id="page">

    <header>

        <h1><a href="index.php?page=home"><span>West Wickham Underwater Hockey Club</span></a></h1><!-- Logo image -->
        <nav>


            <div id="links">
                <ul>
                    <li id="home_btn"><a href="index.php?page=home" class="active">Home</a></li>
                    <li><a href="index.php?page=about">About</a></li>
                    <li><a href="index.php?page=events">Events</a></li>
                    <li><a href="index.php?page=news">News</a></li>
                    <li><a href="index.php?page=media">Media</a></li>
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
    </div>



    <footer>

    </footer>

</div><!--End of Page ID-->



</body>
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



</html>