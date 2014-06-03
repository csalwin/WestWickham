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
            case 'media':
                $this->title = 'In the Club ';
                $this->content = 'media';
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


        }

    }
    public function addEvent()
    {
        $this->data->addEvent();
    }
    public function updateEvent($id)
    {
        $this->data->updateEvent($id);
    }
    public function deleteEvent()
    {
        $this->data->deleteEvent();
    }
    public function viewEvent()
    {
        $this->data->viewEvent();
    }
    public function adminViewEvent()
    {
        $this->data->adminViewEvent();
    }
}

