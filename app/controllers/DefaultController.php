<?php
/**
 * Created by PhpStorm.
 * User: designstudio_2
 * Date: 08/05/2014
 * Time: 14:07
 */

namespace app\controllers;
require_once ('../vendor/autoload.php');
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
            case 'terms':
                $this->title = 'Terms & Condtions Page';
                $this->content = 'terms';
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

                /*if(isset($_POST['squadlist'])){
                $this->data->viewSquad($_POST['squadlist']);
            };*/
                break;
            case 'shop':
                $this->title = 'Shop';
                $this->content = 'shop';
                break;
            case 'contact':

                $this->title = 'Contact Us';
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

    public function westwickhamEmail(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $this->mail = new \PHPMailer;

        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.googlemail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'sonic696@gmail.com';
        $this->mail->Password = 'c2aukc2auk';
        $this->mail->SMTPSecure = 'tls';

        $this->mail->From = $email;
        $this->mail->FromName = $name;
        $this->mail->addBCC('chris.s.alwin@gmail.com','Email test');
        $this->mail->addAddress($email,$name);
        $this->mail->addReplyTo($email,$name);

        $this->mail->WordWrap = 50;
        $this->mail->isHTML(true);
        $this->mail->Subject = 'West Wickham Underwater Hockey Website Comment';


        $this->mail->Body = '<h1><span class="template-label" style="color: #ffffff; font-weight: bold; font-size: 11px;">FORM RECIEVED</span></h1>
         <h2 style="color: #232323; font-family: \'Helvetica\',\'Arial\', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 40px; margin: 0; padding: 0;" align="left">Hi, '.$name.'</h2>
         <p class="comment" style="color:#9e9e9e; font-family:\'Helvetica\',\'Arial\', sans-serif; font-weight:lighter; text-align: left; line-height: 21px; font-size: 18px; margin: 0 0 10px; padding: 0;" align= "left">Thankyou for Your Comment.</p>
           </body>
           <html>';
        $this->mail->AltBody = 'There has been a comment, details as follows:'.'\n\rCustomer\'s Name: '.$name.'\n\rEmail: '.$email.'\n\rComment: '.$comment;
        if(!$this->mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: '.$this->mail->ErrorInfo;
        }else{
            $this->feedback = "thanks";
            return;
        }
    }





}