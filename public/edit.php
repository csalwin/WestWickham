<!DOCTYPE HTML>
<html>
<head>
    <title>PDO Update a Record</title>

</head>
<body>

<h1>PDO: Update a Record</h1>

<?php
//include database connection
include 'connect.php';

$action = isset( $_POST['action'] ) ? $_POST['action'] : "";
if($action == "update"){
    try{

        //write query
        //in this case, it seemed like we have so many fields to pass and
        //its kinda better if we'll label them and not use question marks
        //like what we used here
        $query = "update events
                    set eventname = :eventname, eventlocation = :eventlocation, eventdate = :eventdate
                    where id = :id";

        //prepare query for excecution
        $stmt = $con->prepare($query);

        //bind the parameters
        $stmt->bindParam(':eventname', $_POST['eventname']);
        $stmt->bindParam(':eventlocation', $_POST['eventlocation']);
        $stmt->bindParam(':eventdate', $_POST['eventdate']);

        $stmt->bindParam(':id', $_POST['id']);

        // Execute the query
        if($stmt->execute()){
            echo "Record was updated.";
        }else{
            die('Unable to update record.');
        }

    }catch(PDOException $exception){ //to handle error
        echo "Error: " . $exception->getMessage();
    }
}

try {

    //prepare query
    $query = "SELECT * FROM events WHERE id = ? limit 0,1";
    $stmt = $con->prepare( $query );

    //this is the first question mark
    $stmt->bindParam(1, $_REQUEST['id']);

    //execute our query
    $stmt->execute();

    //store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //values to fill up our form
    $id = $row['id'];
    $eventname = $row['eventname'];
    $eventlocation = $row['eventlocation'];
    $eventdate = $row['eventdate'];


}catch(PDOException $exception){ //to handle error
    echo "Error: " . $exception->getMessage();
}


?>
<!--we have our html form here where new user information will be entered-->
<form action='#' method='post' border='0'>
    <table>
        <tr>
            <td>eventname</td>
            <td><input type='text' name='eventname' value='<?php echo $eventname;  ?>' /></td>
        </tr>
        <tr>
            <td>eventlocation</td>
            <td><input type='text' name='eventlocation' value='<?php echo $eventlocation;  ?>' /></td>
        </tr>
        <tr>
            <td>eventdate</td>
            <td><input type='text' name='eventdate'  value='<?php echo $eventdate;  ?>' /></td>
        </tr>

            <td></td>
            <td>
                <!-- so that we could identify what record is to be updated -->
                <input type='hidden' name='id' value='<?php echo $id ?>' />

                <!-- we will set the action to edit -->
                <input type='hidden' name='action' value='update' />
                <input type='submit' value='Edit' />

                <a href='index.php?page=admin'>Back to Admin</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>