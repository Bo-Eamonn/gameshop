<?php

namespace mvc\view;
include_once ('mvc/model/Model.php');
include_once ('mvc/model/User.php');
include_once ('mvc/model/Product.php');

class View{

    private $model;
    public function __construct($model){
        $this->model = $model;
    }
    public function showLogin(){
        require ('templates/login/login.php');
    }
// CREATE
    public function addProduct($result){
        require ('templates/product/addProduct.php');
    }
    public function createProduct($result){
        require ('templates/product/addProduct.php');
    }
    public function addUser($result){
        require ('templates/user/addUser.php');
    }

    public function createUser($result){
        require ('templates/user/addUser.php');
    }

// READ
    public function showHome(){ 
        require ('templates/login/showHome.php');
    }
    public function showProduct($result){
        require ('templates/product/showProduct.php');
    }
    public function showUsers($result){
        require ('templates/user/showUser.php');
    }
// UPDATE
    public function showUpdateProduct($id=NULL){
            require ('templates/product/updateProduct.php');
    }

    public function updateUser($result){
            require ('templates/patient/updateUser.php');
    }
}