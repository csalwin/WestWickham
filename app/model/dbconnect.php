<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 30/05/14
 * Time: 19:51
 */

namespace app\model\dbconnect;


class dbconnect {
    public function __construct(){
        $host = "localhost";
        $db_name = "webdesj3_westwic";
        $username = "root";
        $password = "password";

        try {
            $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
        }

// to handle connection error
        catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
    }

} 