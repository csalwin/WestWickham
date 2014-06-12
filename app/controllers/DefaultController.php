<?php
/**
 * Created by PhpStorm.
 * User: designstudio_2
 * Date: 08/05/2014
 * Time: 14:07
 */

namespace app\controllers;
require_once('../app/model/DefaultModel.php');
use app\model\DefaultModel;
ini_set('display_errors','1');
class DefaultController {


    public function __construct(){
        $this->data = new DefaultModel();

        if(isset($_GET['page'])){
            $this->page = $_GET['page'];

        }else{
            $this->page = 'home';
        }
        switch($this->page){
            case 'home':
                $this->title = 'West Wickham Underwater Hockey';
                $this->content = 'home';
                break;
            case 'about':
                $this->title = 'About The Club';
                $this->content = 'about';
                break;
            case 'events':
                $this->title = 'Up comming Events';
                $this->content = 'events';
                break;
            case 'news':
                $this->title = 'Latest Updates';
                $this->content = 'news';
                break;
            case 'squad':
                $this->title = 'Squad ';
                $this->content = 'squad';
                break;
            case 'shop':
                $this->title = 'Shop';
                $this->content = 'shop';
                break;
            case 'contact':

                $this->title = 'Contact Us';
                if(isset($_GET['submit'])){
                    ini_set('SMTP','mail.british-study.com'); //TODO Remove When Deployed

                    $this->name = $_GET['name'];
                    $this->email = $_GET['email'];

                    $this->comment = $_GET['comment'];


                    $this->sendEmail();

                    if(!empty($response)){
                        echo $response;
                    };
                }
                $this->content = 'contact';
                break;
            case 'login':
                $this->title = 'Login-page';
                $this->content = 'login';
                break;
            case 'admin':
                $this->title = 'Admin-Page';
                $this->content = 'admin/home';
                break;
            case 'addEvent':
                $this->title = 'Add Event';
                $this->content = 'admin/addEvent';
                break;
            case 'updateEvent':
                $this->title = 'Edit Event';
                $this->content = 'admin/updateEvent';
                break;
            case 'deleteEvent':
                $this->title = 'Delete Event';
                $this->content = 'admin/deleteEvent';
                break;
            case 'addSquad':
                $this->title = 'Add Squad Member';
                $this->content = 'admin/addSquad';
                break;
            case 'updateSquad':
                $this->title = 'Update Squad Member';
                $this->content = 'admin/updateSquad';
                break;
            case 'deleteSquad':
                $this->title = 'delete Squad Member';
                $this->content = 'admin/deleteSquad';
                break;


        }

    }
    public function viewEvent()
    {
        $this->data->viewEvent();
    }
    public function addEvent()
    {
        $this->data->addEvent();
    }
    public function updateEvent($id)
    {
        $this->data->updateEvent($id);
    }
    public function deleteEvent($id)
    {
        $this->data->deleteEvent($id);
    }
    public function adminViewEvent()
    {
        $this->data->adminViewEvent();
    }




    public function viewSquad()
    {
        $this->data->viewSquad();
    }
    public function addSquad()
    {
        $this->data->addSquad($_FILES['squadpicture']);

    }
    public function adminViewSquad()
    {
        $this->data->adminViewSquad();
    }
    public function updateSquad($id)
    {
        $this->data->updateSquad($id);
    }

    public function deleteSquad($id)
    {
        $this->data->deleteSquad($id);
    }






    public $name;
    public $email;

    public $comment;
    public $to;
    public $subject;



// process data to form variable that can be mailed: $to, $subject, $message and $headers
    public function sendEmail(){

//Prepare to send Email


        $this->to = "sonic696@gmail.com";
        $this->subject = 'Website Comment';
        $this->headers ="From: $this->email";

        /*$message =
        "$name has sent a comment they are $gender and they commeted that $comment";*/
        $this->message = $this->name.' has sent a comment '.$this->comment;

        /* $message = $name;
         $message .= ' has sent a comment they are ';
         $message .=$gender;
         $message .=' and they commeted that ';
         $message .=$comment; */




//Send Data

        if(mail($this->to,$this->subject,$this->message, $this->headers)){

            $response = '<h2>Thankyou for your Message</h2>';

        }
        else {
            $response = '<h2>Sorry There has been a problem. Please <a href="javascript:history.back()">try again</a> </h2>';
        }
        return $response;



//If data sent ok say Thankyou

// If Data not sent say there's a problem
    }
}