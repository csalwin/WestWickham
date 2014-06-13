<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>West Wickham Underwater Hockey</title>
    <script src="js/min/modernizr.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
</head>
<body onload="junior_page()">
<div id="page">

    <header>

        <h1><a href="home.html"><span>West Wickham Underwater Hockey Club</span></a></h1><!-- Logo image -->
        <nav>


            <div id="links">
                <ul>
                    <li id="home_btn"><a href="home.html" class="active">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="events.html">Events</a></li>
                    <li><a href="news.html">News</a></li>
                    <li><a href="media.html">Media</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="contact.html">Contact</a></li>
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

<!----

<?php
/*

$page_id = '169748219778916';
$access_token = '705713249476165|i_xh3sX7ou5pirIGjSMned7-I_U';
//Get the JSON
//$json_object = @file_get_contents('https://graph.facebook.com/'.$page_id.'/posts?access_token='.$access_token);


$json_object = @file_get_contents('https://graph.facebook.com/' . $page_id .
    '/posts?access_token=' . $access_token);

//@file_get_contents

//Interpret data


$fbdata = json_decode($json_object);

print_r($fbdata);
foreach ($fbdata->data as $post )
{
    $posts .= '<p><a href="' . $post->link . '">' . $post->name . '</a></p>';
     $posts .= '<p><a href="' . $post->link . '">' . $post->story . '</a></p>';
     $posts .= '<p><a href="' . $post->link . '">' . $post->message . '</a></p>';
     $posts .= '<p>' . $post->description . '</p>';
     $posts .= '<br />';
    echo $posts;
}




*/
?>---->

        <div id="FeederNinja_cebe8acd529d458b89f025e2754ef2e8"></div>
        <script type="text/javascript">
            (function() {
                var fn = document.createElement('script'); fn.type = 'text/javascript';
                fn.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'feederninja.com/api/feed/cebe8acd529d458b89f025e2754ef2e8?fnurl=' + window.location.href;
                var s = document.getElementsByTagName('head')[0].appendChild(fn);
            })();
        </script>








        <div class="feedgrabbr_widget" id="fgid_ea2a41112a3884657b52711b1"></div>
        <script> if (typeof(fg_widgets)==="undefined") fg_widgets = new Array();fg_widgets.push("fgid_ea2a41112a3884657b52711b1");</script>
        <script src='http://www.feedgrabbr.com/widget/fgwidget.js'></script>


        705713249476165|i_xh3sX7ou5pirIGjSMned7-I_U


        <p>169748219778916</p>


        https://graph.facebook.com/169748219778916/posts?access_token=705713249476165|i_xh3sX7ou5pirIGjSMned7-I_U

    </div>

    <footer>
        <img src="admin-home.phtml"/>

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