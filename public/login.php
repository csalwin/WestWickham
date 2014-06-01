<?php
session_start();
if(isset($_SESSION['usr']) && isset($_SESSION['pswd'])){
header("Location: index.php?page=admin");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>West Wickham Underwater Hockey</title>
    <script src="js/min/modernizr.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
    <style>
        body {
            background-color: #29366f;
        }
        #content {
            display: block;
            margin: 0 auto;
            width: 327px;
        }
        #content img {
            max-width: 327px;
            width: 100%;
            display: block;
            margin: 0 auto;
        }
        body #page #content #contact_form form p input {
            display: block;
            width: 300px;

            margin: 0 auto;
        }
        body #page #content #contact_form form .submit input {
            background-color: #1D264D;
        }

    </style>

</head>
<body onload="junior_page()">
<div id="page">

    <div id="content">

        <img src="images/home/West%20Wickham_mens%20suit%20V2.jpg">
        <div id="contact_form">
        <form id="login" name="login" method="post" action="checklogin.php" >
            <p class="username">
                <input type="text" name="usr" id="usr" placeholder="User Name" />
            </p>

            <p class="password">
                <input type="password" name="pswd" id="pswd" placeholder="Password" />
            </p>
            <p class="submit">
                <input type="submit" value="Login" name="login" />
            </p>
        </form>
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