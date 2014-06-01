<!DOCTYPE HTML>
<html>
<head>
    <title>PDO Create Record - http://codeofaninja.com/</title>

</head>
<body>

<h1>Edit Events</h1>

<?php
$action = isset($_POST['action']) ? $_POST['action'] : "";

if($action=='create'){
    //include database connection
    include 'connect.php';

    try{

        //write query
        $query = "INSERT INTO events SET eventname = ?, eventlocation = ?, eventdate = ?";

        //prepare query for excecution
        $stmt = $con->prepare($query);

        //bind the parameters
        //this is the first question mark
        $stmt->bindParam(1, $_POST['eventname']);

        //this is the second question mark
        $stmt->bindParam(2, $_POST['eventlocation']);

        //this is the third question mark
        $stmt->bindParam(3, $_POST['eventdate']);


        // Execute the query
        if($stmt->execute()){

            echo "Record was saved.";
        }else{
            die('Unable to save record.');
        }

    }catch(PDOException $exception){ //to handle error
        echo "Error: " . $exception->getMessage();
    }
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