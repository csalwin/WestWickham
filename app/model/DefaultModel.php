<?php
/**
 * Created by PhpStorm.
 * User: designstudio_2
 * Date: 03/06/2014
 * Time: 13:26
 */

namespace app\model;

use \PDO;
class DefaultModel {
    public function __construct(){
        $host = "localhost";
        $db_name = "webdesj3_westwic";
        $username = "root";
        $password = "password";

        try {
            $this->con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
        }

// to handle connection error
        catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
    }
    public function addEvent(){
        $action = isset($_POST['action']) ? $_POST['action'] : "";

        //if($action=='create'){
            //include database connection
          //  include 'connect.php';

            try{

                //write query
            $query = "INSERT INTO events SET eventname = ?, eventlocation = ?, eventdate = ?";

                //prepare query for excecution
            $stmt = $this->con->prepare($query);

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
    public function updateEvent($id){
        $action = isset( $_POST['action'] ) ? $_POST['action'] : "";
        if($action == "update"){
            try{

                //write query
                //in this case, it seemed like we have so many fields to pass and
                //its kinda better if we'll label them and not use question marks
                //like what we used here
                $query = "UPDATE events
                    SET eventname = :eventname, eventlocation = :eventlocation, eventdate = :eventdate
                    WHERE id = :id";

                //prepare query for excecution
                $stmt = $this->con->prepare($query);

                //bind the parameters
                $stmt->bindParam(':eventname', $_POST['eventname']);
                $stmt->bindParam(':eventlocation', $_POST['eventlocation']);
                $stmt->bindParam(':eventdate', $_POST['eventdate']);

                $stmt->bindParam(':id', $id);

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
            $stmt = $this->con->prepare( $query );

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
        echo "<form action='#' method='post' border='0'>";
        echo "<table>";
        echo "<tr>";
                    echo"<td>eventname</td>";
                    echo "<td><input type='text' name='eventname' value='{$eventname}' /></td>";
                echo"</tr>";
                echo"<tr>";
                    echo"<td>eventlocation</td>";
                    echo"<td><input type='text' name='eventlocation' value='{$eventlocation}' /></td>";
                echo"</tr>";
                echo"<tr>";
                    echo"<td>eventdate</td>";
                    echo"<td><input type='text' name='eventdate'  value='{$eventdate}' /></td>";
                echo"</tr>";

                echo"<td></td>";
                echo"<td>";
                    echo"<!-- so that we could identify what record is to be updated -->";
                    echo"<input type='hidden' name='id' value='<?php echo $id ?>' />";

                    echo"<!-- we will set the action to edit -->";
                    echo"<input type='hidden' name='action' value='update' />";
                    echo"<input type='submit' value='Edit' />";

                    echo"<a href='index.php?page=admin'>Back to Admin</a>";
                echo"</td>";
                echo"</tr>";
            echo"</table>";
        echo"</form>";
        }
    public function viewEvent(){

        $action = isset($_GET['action']) ? $_GET['action'] : "";


//select all data
        $query = "SELECT * FROM events";
        $stmt = $this->con->prepare( $query );
        $stmt->execute();

//this is how to get number of rows returned
        $this->num = $stmt->rowCount();




        $this->num = $stmt->rowCount();

        if($this->num>0){ //check if more than 0 record found

            echo "<table border='1'>";//start table

            //creating our table heading
            echo "<tr>";
            echo "<th>Event</th>";
            echo "<th>Date</th>";
            echo "<th>Location</th>";
            //echo "<th>Action</th>";
            echo "</tr>";

            //retrieve our table contents
            //fetch() is faster than fetchAll()
            //http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                //extract row
                //this will make $row['firstname'] to
                //just $firstname only
                extract($row);

                //creating new table row per record
                echo "<tr>";
                echo "<td>{$eventname}</td>";
                echo "<td>{$eventdate}</td>";
                echo "<td>{$eventlocation}</td>";


                echo "</tr>";
            }

            //end table
            echo "</table>";

        }

//if no records found
        else{
            echo "No records found.";
        }

    }
    public function adminViewEvent(){

        $action = isset($_GET['action']) ? $_GET['action'] : "";


//select all data
        $query = "SELECT * FROM events";
        $stmt = $this->con->prepare( $query );
        $stmt->execute();

//this is how to get number of rows returned
        $this->num = $stmt->rowCount();




        $this->num = $stmt->rowCount();

        if($this->num>0){ //check if more than 0 record found

            echo "<table border='1'>";//start table

            //creating our table heading
            echo "<tr>";
            echo "<th>Event</th>";
            echo "<th>Date</th>";
            echo "<th>Location</th>";
            //echo "<th>Action</th>";
            echo "</tr>";

            //retrieve our table contents
            //fetch() is faster than fetchAll()
            //http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                //extract row
                //this will make $row['firstname'] to
                //just $firstname only
                extract($row);

                //creating new table row per record
                echo "<tr>";
                echo "<td>{$eventname}</td>";
                echo "<td>{$eventdate}</td>";
                echo "<td>{$eventlocation}</td>";

                echo "<td>";
                //we will use this links on next part of this post
                echo "<a href='index.php?page=updateEvent&id={$id}'>Edit</a>";
                echo " / ";
                //we will use this links on next part of this post
                echo "<a href='#' onclick='delete_user( {$id} );'>Delete</a>";
                echo "</td>";


                echo "</tr>";
            }

            //end table
            echo "</table>";

        }

//if no records found
        else{
            echo "No records found.";
        }

    }
    }


