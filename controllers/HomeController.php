<?php

class HomeController extends Controller {
    private $homeModel;

    public function __construct()
    {
        // $this->homeModel = $this->model('HomeModel');
        
    }

    public function index()
    {
        // $data = $this->userModel->index();
        return $this->viewHome('home/index');
    }

    public function login(){
        return $this->viewHome('');
    }
}

?>