<?php

namespace controllers;

use core\BaseController;
use models\UserModel;

class UserController extends BaseController{
    public function __construct()
    {
        $this->layot == true;
    }

    public function actionIndex()
    {
        $this->layot == true;
        $this->render('index', ['model'=> ['id' => 1, 'task' => 'task1']]);
        
    }

    public function actionLogin(){
        var_dump($_POST);
        die();
    }

    public function actionRegister(){
        $user = new UserModel;
        if($user->loadPost() && $user->validate()){
            // Перевірка чи існує такий юзер
            if($user->save()){
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['success'] = 'User is registered';
                $this->render('index');
                // var_dump($user);
                // die();
            } else {
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['error'] = "ERROR in user's register";
            }
        } else {
            if(!isset($_SESSION)){
                session_start();
            }
            echo $_SESSION['error'];
            $this->render('index');
        }
    }
}