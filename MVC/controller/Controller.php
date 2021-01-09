<?php

namespace mvc\controller;
include_once "mvc/view/View.php";
use mvc\view\View;
include_once "mvc/model/Patient.php";
use mvc\model\Patient;
include_once "mvc/model/Med.php";
use mvc\model\Med;
include_once "mvc/model/User.php";
use mvc\model\User;
include_once "mvc/model/Model.php";
use mvc\model\Model;

class Controller{
    private $view;
    private $model;
    public function __construct(){
        $this->model = new Model();
        $this->view = new View($this->model);
    }
//CRUD MED
    public function showMedAction(){
        $result = $this->model->getMed();
        $this->view->showMed($result);
    }
    public function addMedAction(){
        $result = "";
        $this->view->createMed($result);
    }
    public function saveMed() {
        $name = filter_input(INPUT_POST,'name');
        $cat = $_POST["cat"];
        $insured = filter_input(INPUT_POST,'insured');
        $this->model->createMed($name, $cat, $insured);
        $this->showMedAction();
    }
    public function deleteMed() {
        $id = $_POST["deleteMed"];
        $delMed = $this->model->deleteMed($id);
        $this->showMedAction();
    }
    public function showUpdateMed($id=null) {
        $this->view->showUpdateMed($id);
    }
    public function updateMed(){
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST,'name');
        $cat = $_POST["cat"];
        $insured = filter_input(INPUT_POST,'insured');
        $result = $this->model->updateMed($id, $name, $cat, $insured);
        $this->view->showMed($result);
    }
//CRUD USER
    public function showUserAction(){
        $result = $this->model->getUsers();
        $this->view->showUsers($result);
    }
    public function addUserAction(){
        $result = "";
        $this->view->createUser($result);
    }
    public function saveUser() {
        $uname = filter_input(INPUT_POST, 'uname');
        $pass = filter_input(INPUT_POST, 'pswrd');
        $role = $_POST['role'];
        $pswrdHash = strtoupper(hash("sha256", $pass));
        $pswrd = $pswrdHash;
        $this->model->createUser($uname, $pswrd, $role);
        $this->showUserAction();
    }
    public function deleteUser() {
        $id = $_POST["deleteUser"];
        $delUser = $this->model->deleteUser($id);
        $this->showUserAction();
    }
    public function editUser() {
        $id = $_POST["editUser"];
        $user = $this->model->getUsers($id);
        $this->view->updateUser($user);
    }
//CRUD PATIENT
    public function showPatientAction(){
        $result = $this->model->getPatients();
        $this->view->showPatients($result);
    }
    public function addPatientAction(){
        $result = "";
        $this->view->createPatient($result);
    }
    public function savePatient() {
        $naam = filter_input(INPUT_POST,'naam');
        $huidigeMed = filter_input(INPUT_POST,'huidigeMed');
        $medHis = filter_input(INPUT_POST,'medHis');
        $notes = filter_input(INPUT_POST,'notes');
        $adres = filter_input(INPUT_POST,'adres');
        $woonplaats = filter_input(INPUT_POST,'woonplaats');
        $zknummer = filter_input(INPUT_POST,'zknummer');
        $geboortedatum = filter_input(INPUT_POST,'geboortedatum');
        $soortVerzekering = $_POST["soortVerzekering"];
        $this->model->createPatient($naam, $huidigeMed, $medHis, $notes, $adres, $woonplaats, $zknummer, $geboortedatum, $soortVerzekering);
        $this->showPatientAction();
    }
    public function deletePatient() {
        $id = $_POST["deletePatient"];
        $delPatient = $this->model->deletePatient($id);
        $this->showPatientAction();
    }
    public function editPatient() {
        $id = $_POST["editPatient"];
        $patient = $this->model->getPatients($id);
        $this->view->updatePatient($patient);

    }
    public function loginAction()
    {
        if (isset($_POST['uname']) && isset($_POST['pswrd'])) {
            $uname = filter_input(INPUT_POST, 'uname');
            $pswrd = filter_input(INPUT_POST, 'pswrd');
            $this->model->login($uname, $pswrd);
        
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                $this->model->getHome();
                $this->view->showHome();
            } else {
                $this->view->showLogin();
            }
        }else {
                $this->view->showLogin();
        }
    }
    
    public function showHomeAction(){
        $this->model->getHome();
        $this->view->showHome();
    }

    public function logoutAction(){
        $this->model->logout();
        $this->view->showLogin();
        
    }
}