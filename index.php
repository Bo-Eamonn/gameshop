<?php

use mvc\controller\Controller;

include_once "mvc/controller/Controller.php"; 
$controller = new Controller();

    session_start();
// ADMIN LOGIN    
    if (isset($_SESSION['role']) && $_SESSION['role']=="admin") {
        if (isset($_POST['logout'])){
            $controller->logoutAction();
        }
//CRUD PRODUCTS        
        elseif (isset($_POST['products']) || isset($_POST['cancelProduct'])) {
            $controller->showProductAction();
        }elseif (isset($_POST['showAddProduct'])) {
            $controller->addProductAction();
        }elseif (isset($_POST['toevoegenProduct'])) {
            $controller->saveProduct();
        } elseif(isset($_POST['deleteProduct'])) {
            $controller->deleteProduct();
        } elseif(isset($_POST['showUpdateProduct'])) {
            $controller->showUpdateProduct($id);
        } elseif (isset($_POST['updateProduct'])) {
            $controller->updateProduct();
        }
//CRUD USERS
        elseif (isset($_POST['user']) || isset($_POST['cancelUser'])) {
            $controller->showUserAction();
        }elseif (isset($_POST['showAddUser'])) {
            $controller->addUserAction();
        }elseif (isset($_POST['toevoegenUser'])) {
            $controller->saveUser();
        } elseif(isset($_POST['deleteUser'])) {
            $controller->deleteUser();
        } elseif(isset($_POST['editUser'])) {
            $controller->editUser();
        }
        else {
            $controller->showProductAction();
        }
//Customer login        
    }elseif (isset($_SESSION['role']) && $_SESSION['role']=="customer") {
        if (isset($_POST['logout'])){
            $controller->logoutAction();
        }elseif (isset($_POST['products'])){
            $controller->showProductAction();
        }else {
            $controller->showProductAction();
        }
    }
//If not logged in as Admin
    elseif(isset($_POST['inloggen'])){
        $controller->loginAction();
    } else {
        $controller->showProductAction();
    }