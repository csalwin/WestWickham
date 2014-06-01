<?php
/**
 * Created by PhpStorm.
 * User: designstudio_2
 * Date: 08/05/2014
 * Time: 14:07
 */

namespace app\controllers;


class DefaultController {
    public $page;

    public function __construct(){
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
                $this->content = 'admin';
                break;
            default:
                $this->title = 'West Wickham Underwater Hockey Club';
                $this->content = 'home';
                break;

        }

    }


}
