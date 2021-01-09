<?php

namespace mvc\view;
include_once ('mvc/model/Model.php');
include_once ('mvc/model/User.php');
include_once ('mvc/model/Patient.php');
include_once ('mvc/model/Med.php');

class View{

    private $model;
    public function __construct($model){
        $this->model = $model;
    }
    public function showLogin(){
        require ('templates/login/login.php');
    }
// CREATE
    public function addMed($result){
        require ('templates/med/addMed.php');
    }
    public function createMed($result){
        require ('templates/med/addMed.php');
    }

    public function addPatient($result){
        require ('templates/patient/addPatient.php');
    }

    public function createPatient($result){
        require ('templates/patient/addPatient.php');
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

    public function showMed($result){
        require ('templates/med/showMed.php');
    }

    public function showPatients($result){
        require ('templates/patient/showPatient.php');
    }

    public function showUsers($result){
        require ('templates/user/showUser.php');
    }
// UPDATE
    public function showUpdateMed($id=NULL){
            require ('templates/med/updateMed.php');
}
        
    public function updatePatient($result){
            require ('templates/patient/updatePatient.php');
    }
    
    public function updateUser($result){
            require ('templates/patient/updateUser.php');
    }
}