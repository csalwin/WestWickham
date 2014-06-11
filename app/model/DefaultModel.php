<?php
/**
 * Created by PhpStorm.
 * User: designstudio_2
 * Date: 03/06/2014
 * Time: 13:26
 */

namespace app\model;



use apps\base\models\SimpleImage;
use \PDO;
include ('../app/model/SimpleImage.php');
class DefaultModel {
    public function __construct(){
        $host = "localhost";
        $db_name = "webdesj3_westwic";
        $username = "webdesj3_westwic";
        $password = "password123";

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
                    echo"<td>Name of Event</td>";
                    echo "<td><input type='text' name='eventname' value='{$eventname}' /></td>";
                echo"</tr>";
                echo"<tr>";
                    echo"<td>Location Of Event</td>";
                    echo"<td><input type='text' name='eventlocation' value='{$eventlocation}' /></td>";
                echo"</tr>";
                echo"<tr>";
                    echo"<td>Date Of Event</td>";
                    echo"<td><input type='date' name='eventdate'  value='{$eventdate}' /></td>";
                echo"</tr>";

                echo"<td><input type='submit' value='Edit' /></td>";
                echo"<td>";
                    echo"<!-- so that we could identify what record is to be updated -->";
                    echo"<input type='hidden' name='id' value='<?php echo $id ?>' />";

                    echo"<!-- we will set the action to edit -->";
                    echo"<input type='hidden' name='action' value='update' />";


                    echo"<a href='index.php?page=admin'>Back to Admin</a>";
                echo"</td>";
                echo"</tr>";
            echo"</table>";
        echo"</form>";
        }




    public function viewEvent(){

        $action = isset($_GET['action']) ? $_GET['action'] : "";


//select all data
        $query = "SELECT * FROM events ORDER BY eventdate";
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
                //Convert the date so that it reads Correctly ******************************************************
                $eventdatedmy = date_format(date_create_from_format('Y-m-d', $eventdate), 'd-m-Y');

                //creating new table row per record
                echo "<tr>";
                echo "<td>{$eventname}</td>";
                echo "<td>{$eventdatedmy}</td>";
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
        $query = "SELECT * FROM events ORDER BY eventdate";
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
                //Convert the date so that it reads Correctly ******************************************************
                $eventdatedmy = date_format(date_create_from_format('Y-m-d', $eventdate), 'd-m-Y');

                //creating new table row per record
                echo "<tr>";
                echo "<td>{$eventname}</td>";
                echo "<td>{$eventdatedmy}</td>";
                echo "<td>{$eventlocation}</td>";

                echo "<td>";
                //we will use this links on next part of this post
                echo "<a href='index.php?page=updateEvent&id={$id}'>Edit</a>";
                echo " / ";
                //we will use this links on next part of this post
                echo "<a href='index.php?page=deleteEvent&id={$id}' onclick='return confirm(\"Are you sure you want to DELETE Event {$eventname}?\")'>Delete</a>";
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

    public function deleteEvent($id){
        try {

            // delete query
            $query = "DELETE FROM events WHERE id = ? ";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(1, $_GET['id']);

           if($stmt->execute()){
                // redirect to index page
                header('Location: index.php?page=admin');
            }else{
                die('Unable to delete record.');

            }
        }

// to handle error
        catch(PDOException $exception){
            echo "Error: " . $exception->getMessage();
        }
    }

//SQUAD FUNCTIONS ******************************************************************************************************************************

    public function viewSquad(){
        $action = isset($_GET['action']) ? $_GET['action'] : "";


//select all data
        $query = "SELECT * FROM squad ORDER BY squadname, squaddob";
        $stmt = $this->con->prepare( $query );
        $stmt->execute();

//this is how to get number of rows returned
        $this->num = $stmt->rowCount();




        $this->num = $stmt->rowCount();

        if($this->num>0){ //check if more than 0 record found

            echo "<table border='1'>";//start table

            //creating our table heading
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Picture</th>";
            echo "<th>Date of Birth</th>";
            echo "<th>Bio</th>";
            echo "<th>Team</th>";
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
                //Convert the date so that it reads Correctly ******************************************************
                $squaddobdmy = date_format(date_create_from_format('Y-m-d', $squaddob), 'd-m-Y');

                //creating new table row per record
                echo "<tr>";
                echo "<td>{$squadname}</td>";
                echo "<td><img src='images/squad/profile/{$squadpicture}' width='150px'/></td>";
                echo "<td>{$squaddobdmy}</td>";
                echo "<td>{$squadbio}</td>";
                echo "<td>{$squadteam}</td>";


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

    public function addSquad(){
        $action = isset($_POST['action']) ? $_POST['action'] : "";
        $imagefile = $_FILES['squadpicture']['name'];
        if($image = new SimpleImage()) {
            $image->load($_FILES['squadpicture']['tmp_name']);
            $image->resizeToHeight(320);
            $image->save('images/squad/profile/'.$_FILES['squadpicture']['name']);

        //if($action=='create'){
        //include database connection
        //  include 'connect.php';

        try{

            //write query
            $query = "INSERT INTO squad SET squadname = ?, squadpicture = ?, squaddob = ?, squadbio = ?, squadteam = ?";

            //prepare query for excecution
            $stmt = $this->con->prepare($query);

            //bind the parameters
            //this is the first question mark
            $stmt->bindParam(1, $_POST['squadname']);

            $stmt->bindParam(2, $_FILES['squadpicture']['name']);
            $stmt->bindParam(3, $_POST['squaddob']);

            $stmt->bindParam(4, $_POST['squadbio']);
            $stmt->bindParam(5, $_POST['squadteam']);


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

    /*public function addImage()
    {
        if($image = new SimpleImage($_FILES['squadpicture'])) {
            $this->filename = basename($_FILES['squadpicture']['name']);
            $image->resizeToHeight(320);
            $image->save('images/squad/profile'.$this->file);
            $sql = "INSERT INTO squad(id,image) VALUES (null,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array(
                $this->filename
            ));

        }*/
    }

    public function adminViewSquad(){

        $action = isset($_GET['action']) ? $_GET['action'] : "";


//select all data
        $query = "SELECT * FROM squad ORDER BY squadname, squaddob";
        $stmt = $this->con->prepare( $query );
        $stmt->execute();

//this is how to get number of rows returned
        $this->num = $stmt->rowCount();




        $this->num = $stmt->rowCount();

        if($this->num>0){ //check if more than 0 record found

            echo "<table border='1'>";//start table

            //creating our table heading
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Picture</th>";
            echo "<th>DOB</th>";
            echo "<th>Bio</th>";
            echo "<th>Team</th>";
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
                //Convert the date so that it reads Correctly ******************************************************
                $squaddobdmy = date_format(date_create_from_format('Y-m-d', $squaddob), 'd-m-Y');

                //creating new table row per record
                echo "<tr>";
                echo "<td>{$squadname}</td>";
                echo "<td><img src='images/squad/profile/{$squadpicture}' width='150px'/></td>";
                echo "<td>{$squaddobdmy}</td>";
                echo "<td>{$squadbio}</td>";
                echo "<td>{$squadteam}</td>";

                echo "<td>";
                //we will use this links on next part of this post
                echo "<a href='index.php?page=updateSquad&id={$id}'>Edit</a>";
                echo " / ";
                //we will use this links on next part of this post
                echo "<a href='index.php?page=deleteSquad&id={$id}' onclick='return confirm(\"Are you sure you want to DELETE squad member {$squadname}?\")'>Delete</a>";
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

    public function updateSquad($id){
        $action = isset( $_POST['action'] ) ? $_POST['action'] : "";
        if($action == "update"){
            try{

                //write query
                //in this case, it seemed like we have so many fields to pass and
                //its kinda better if we'll label them and not use question marks
                //like what we used here
                $query = "UPDATE squad
                    SET squadname = :squadname, squadpicture = :squadpicture, squaddob = :squaddob, squadbio = :squadbio, squadteam =:squadteam
                    WHERE id = :id";

                //prepare query for excecution
                $stmt = $this->con->prepare($query);

                //bind the parameters
                $stmt->bindParam(':squadname', $_POST['squadname']);
                $stmt->bindParam(':squadpicture', $_POST['squadpicture']);
                $stmt->bindParam(':squaddob', $_POST['squaddob']);
                $stmt->bindParam(':squadbio', $_POST['squadbio']);
                $stmt->bindParam(':squadteam', $_POST['squadteam']);

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
            $query = "SELECT * FROM squad WHERE id = ? limit 0,1";
            $stmt = $this->con->prepare( $query );

            //this is the first question mark
            $stmt->bindParam(1, $_REQUEST['id']);

            //execute our query
            $stmt->execute();

            //store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //values to fill up our form
            $id = $row['id'];
            $squadname = $row['squadname'];
            $squadpicture = $row['squadpicture'];
            $squaddob = $row['squaddob'];
            $squadbio = $row['squadbio'];
            $squadteam = $row['squadteam'];


        }catch(PDOException $exception){ //to handle error
            echo "Error: " . $exception->getMessage();
        }






        echo "<form action='#' method='post' border='0'>";
        echo "<table>";
        echo "<tr>";
        echo"<td>Name Member</td>";
        echo "<td><input type='text' name='squadname' value='{$squadname}' /></td>";
        echo"</tr>";
        echo"<tr>";
        echo"<td>Member Picture</td>";
        echo"<td><input type='text' name='squadpicture' value='{$squadpicture}' /></td>";
        echo"</tr>";
        echo"<tr>";
        echo"<td>Date of Birth</td>";
        echo"<td><input type='date' name='squaddob'  value='{$squaddob}' /></td>";
        echo"</tr>";
        echo"<tr>";
        echo"<td>Member Bio</td>";
        echo"<td><input type='text' name='squadbio'  value='{$squadbio}' /></td>";
        echo"</tr>";
        echo"<td>Team</td>";
        echo"<td><select name='squadteam'>";
                    echo "<option value='First Team'>First Team</option>";
                    echo "<option value='Second Team'>Development Team</option>";

                echo "</select>$squadteam</td>";
        echo"</tr>";

        echo"<td><input type='submit' value='Edit' /></td>";
        echo"<td>";
        echo"<!-- so that we could identify what record is to be updated -->";
        echo"<input type='hidden' name='id' value='<?php echo $id ?>' />";

        echo"<!-- we will set the action to edit -->";
        echo"<input type='hidden' name='action' value='update' />";


        echo"<a href='index.php?page=admin'>Back to Admin</a>";
        echo"</td>";
        echo"</tr>";
        echo"</table>";
        echo"</form>";
    }

    public function deleteSquad($id){
        try {

            // delete query
            $query = "DELETE FROM squad WHERE id = ? ";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(1, $_GET['id']);

            if($stmt->execute()){
                // redirect to index page
                header('Location: index.php?page=admin');
            }else{
                die('Unable to delete record.');

            }
        }

// to handle error
        catch(PDOException $exception){
            echo "Error: " . $exception->getMessage();
        }
    }

}


