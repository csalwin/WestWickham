<!DOCTYPE HTML>
<html>
<head>
    <title>PDO Create Record - http://codeofaninja.com/</title>

</head>
<body>

<h1>Edit Events</h1>

<?php
if($_POST['submit']){
    include('../app/controllers/DefaultController.php');
    $session = new app\controllers\DefaultController();
    $session->addEvent();
}
?>

<!--we have our html form here where user information will be entered-->
<form action='#' method='post' border='0'>
    <table>
        <tr>
            <td>Name Of Event</td>
            <td><input type='text' name='eventname' /></td>
        </tr>
        <tr>
            <td>Location Of Event</td>
            <td><input type='text' name='eventlocation' /></td>
        </tr>
        <tr>
            <td>Date Of Event</td>
            <td><input type='text' name='eventdate' /></td>
        </tr>

            <td></td>
            <td>
                <input type='hidden' name='action' value='create' />
                <input type='submit' value='Save' />

                <a href='index.php?page=admin'>Back to admin</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>