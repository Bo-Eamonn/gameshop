<?php

namespace mvc\controller;
include_once "mvc/view/View.php";
use mvc\view\View;
include_once "mvc/model/Product.php";
use mvc\model\Product;
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
//CRUD Product
    public function showProductAction(){
        $result = $this->model->getProduct();
        $this->view->showProduct($result);
    }
    public function addProductAction(){
        $result = "";
        $this->view->createProduct($result);
    }
    public function saveProduct() {
        $name = filter_input(INPUT_POST,'name');
        $cat = $_POST["cat"];
        $description = filter_input(INPUT_POST,'description');
        $price = filter_input(INPUT_POST,'price');
        $stock = filter_input(INPUT_POST,'stock');
        $this->model->createProduct($name, $cat, $description, $price, $stock);
        $this->showProductAction();
    }
    public function deleteProduct() {
        $id = $_POST["deleteProduct"];
        $delProduct = $this->model->deleteProduct($id);
        $this->showProductAction();
    }
    public function showUpdateProduct($id=null) {
        $this->view->showUpdateProduct($id);
    }
    public function updateProduct(){
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST,'name');
        $cat = $_POST["cat"];
        $description = filter_input(INPUT_POST,'description');
        $price = filter_input(INPUT_POST,'price');
        $stock = filter_input(INPUT_POST,'stock');
        $result = $this->model->createProduct($id,$name, $cat, $description, $price, $stock);
        $this->view->showProduct($result);
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

    public function loginAction()
    {
        if (isset($_POST['uname']) && isset($_POST['pswrd'])) {
            $uname = filter_input(INPUT_POST, 'uname');
            $pswrd = filter_input(INPUT_POST, 'pswrd');
            $this->model->login($uname, $pswrd);
        
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                $result = $this->model->getProduct();
                $this->view->showProduct($result);
            } else {
                $this->view->showLogin();
            }
        }else {
                $this->view->showLogin();
        }
    }
    
    public function logoutAction(){
        $this->model->logout();
        $this->view->showLogin();
        
    }
}