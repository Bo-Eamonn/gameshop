<?php

namespace mvc\model;

use PDO;

include_once ('mvc/model/product.php');
include_once ('mvc/model/User.php');
 
class Model
{
    private $db;

    private function connectDb(){
        $this->db = new PDO('mysql:host=localhost;dbname=gameshop', "root", "");
    }
//Login
    public function login($uname, $pswrd){
        $this->connectDb();
        $query = $this->db->prepare('SELECT * FROM `users` WHERE `users`.`uname` =:uname');
        $query->bindParam(":uname", $uname);
        $result = $query->execute();
        if($result) {
            $query->setFetchMode(\PDO::FETCH_CLASS, User::class);
            $user = $query->fetch();
            if ($user) {
                $gehashtpassword = strtoupper(hash("sha256", $pswrd));
                // var_dump($gehashtpassword);  use to check if password was hased
                if ($user->getPswrd() == $gehashtpassword) {
                    $_SESSION['username'] = $user->getUname();
                    $_SESSION['role'] = $user->getRole();
                }
            }
        }
    }
//logout    
    public function logout(){    
    session_unset();
    session_destroy();
    header("location: /gameshop/");
    exit;
    }


//Create New Product
    public function createProduct($name,$description,$cat,$price,$stock){
        $this->connectDb();
        if ($name !='' && $description !='' && $cat !='' && $price !='' && $stock !='') {
            $query = $this->db->prepare("INSERT INTO `products` (`id`, `name`, `description`, `cat`, `price`, `stock` ) VALUES ('',:name,:description,:cat,:price,:stock)");
            $query->bindParam(":name", $name); 
            $query->bindParam(":description", $description); 
            $query->bindParam(":cat", $cat); 
            $query->bindParam(":price", $price); 
            $query->bindParam(":stock", $stock); 
            $result = $query->execute();
            return $result;
        }
        return -1;
    }
//Read Product
    public function getProduct(){
        $this->connectDb();
        $select = $this->db->query('SELECT * FROM `products` ');
        if ($select) {
            $result=$select->fetchALL(PDO::FETCH_CLASS,Product::class);
            return $result;
        }
        return null;      
    }    
//Update Product
    public function updateProduct($id,$name,$description,$cat,$price,$stock){
        $this->connectDb();
        if ($name !='' && $description !='' && $cat !='' && $price !='' && $stock !='') {
            $query = $this->db->prepare("UPDATE `products` SET `name`=:name, `cat`=:cat, `description`=:description, `price`=:price, `stock`=:stock WHERE `products`.`id`=:id");
            $query->bindParam(":id", $id);
            $query->bindParam(":name", $name);
            $query->bindParam(":description", $description);
            $query->bindParam(":cat", $cat);
            $query->bindParam(":price", $price);
            $query->bindParam(":stock", $stock);
            $result = $query->execute();
            return $result;
        }
    } 
//Delete Product    
    public function deleteProduct($id){
        $this->connectDb();
        $select = $this->db->prepare('DELETE FROM `products` WHERE `products`.`id`=:id');
        $select->bindParam(":id", $id);
        $result = $select->execute();
        return $result;
    }
//Select Product
    public function selectProduct($id){
        $this->connectDb();
        $select = $this->db->prepare("SELECT * FROM `products` WHERE `products`.`id` :id");
        $select->bindParam(":id", $id);
        $result = $select->execute();
        if ($result) {
            $select->setFetchMode(PDO::FETCH_CLASS,Product::class);
            $Product = $select->fetch();
            return $Product;
        }
    return null;
    }    

//Create New User
    public function createUser($uname, $pswrd, $role){
        $this->connectDb();
        if ($uname !='' && $pswrd !='' && $role !='') {
            $query = $this->db->prepare("INSERT INTO `users` (`id`, `uname`, `pswrd`, `role`) VALUES ('', :uname, :pswrd, :role)");
            $query->bindParam(":uname", $uname); 
            $query->bindParam(":pswrd", $pswrd); 
            $query->bindParam(":role", $role); 
            $result = $query->execute();
            return $result;
        }
        return -1;
    }
//Read User
    public function getUsers(){
        $this->connectDb();
        $select = $this->db->query('SELECT * FROM `users` ');
        if ($select) {
            $result=$select->fetchALL(PDO::FETCH_CLASS,User::class);
            return $result;
        }
        return null;
    }
//Update User
    public function updateUser($id, $uname, $pswrd, $role){
        $this->connectDb();
        if ($uname !='' && $pswrd != '' && $role !='') {
            $query = $this->db->prepare("UPDATE `users` SET `name`=:uname, `pswrd`=:pswrd, `role`=:role,  WHERE `users`.`id`=:id");
            $query->bindParam(":id", $id);
            $query->bindParam(":uname", $uname); 
            $query->bindParam(":pswrd", $pswrd);  
            $query->bindParam(":role", $role);  
            $result = $query->execute();
            return $result;
        }
    }
//Delete User
    public function deleteUser($id){
        $this->connectDb();
        $select = $this->db->prepare('DELETE FROM `users` WHERE `users`.`id`=:id');
        $select->bindParam(":id", $id);
        $result = $select->execute();
        return $result;
    }
//Select User
    public function selectUser($id){
        $this->connectDb();
         $select = $this->db->prepare("SELECT * FROM `users` WHERE `users`.`id` :id");
        $select->bindParam(":id", $id);
        $result = $select->execute();
        if ($result) {
            $select->setFetchMode(PDO::FETCH_CLASS,User::class);
            $user = $select->fetch();
            return $user;
        }
    return null;
    }    
}