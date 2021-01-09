<?php

namespace mvc\model;

use PDO;

include_once ('mvc/model/Med.php');
include_once ('mvc/model/Patient.php');
include_once ('mvc/model/User.php');
 
class Model
{
    private $db;

    private function connectDb(){
        $this->db = new PDO('mysql:host=localhost;dbname=healthone', "root", "");
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
    header("location: /healthone_mvc/");
    exit;
    }

//Read Home

public function getHome(){
    if(1+1==2) {
    $text = "Last Login ";
    $date = date("F j, Y, g:i a");
    $result = $text.$date;
    return $result;
    }
    return null;
}
//Create New Med
    public function createMed($name,$cat,$insured){
        $this->connectDb();
        if ($name !='' && $cat !='' && $insured !='') {
            $query = $this->db->prepare("INSERT INTO `med` (`id`, `name`, `cat`, `insured`) VALUES ('',:name, :cat, :insured)");
            $query->bindParam(":name", $name); 
            $query->bindParam(":cat", $cat); 
            $query->bindParam(":insured", $insured); 
            $result = $query->execute();
            return $result;
        }
        return -1;
    }
//Read Med
    public function getMed(){
        $this->connectDb();
        $select = $this->db->query('SELECT * FROM `med` ');
        if ($select) {
            $result=$select->fetchALL(PDO::FETCH_CLASS,Med::class);
            return $result;
        }
        return null;      
    }    
//Update Med
    public function updateMed($id,$name,$cat,$insured){
        $this->connectDb();
        if ($name !='' && $cat !='' && $insured !='') {
            $query = $this->db->prepare("UPDATE `med` SET `name`=:name, `cat`=:cat, `insured`=:insured WHERE `med`.`id`=:id");
            $query->bindParam(":id", $id);
            $query->bindParam(":name", $name);  
            $query->bindParam(":cat", $cat); 
            $query->bindParam(":insured", $insured); 
            $result = $query->execute();
            return $result;
        }
    } 
//Delete MED    
    public function deleteMed($id){
        $this->connectDb();
        $select = $this->db->prepare('DELETE FROM `med` WHERE `med`.`id`=:id');
        $select->bindParam(":id", $id);
        $result = $select->execute();
        return $result;
    }
//Select MED
    public function selectMed($id){
        $this->connectDb();
        $select = $this->db->prepare("SELECT * FROM `med` WHERE `med`.`id` :id");
        $select->bindParam(":id", $id);
        $result = $select->execute();
        if ($result) {
            $select->setFetchMode(PDO::FETCH_CLASS,Med::class);
            $med = $select->fetch();
            return $med;
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
//Create New Patient
    public function createPatient($naam, $huidigeMed, $medHis, $notes, $adres, $woonplaats, $zknummer, $geboortedatum, $soortVerzekering){
        $this->connectDb();
        if ($naam !='' && $huidigeMed !='' && $medHis !='' && $notes !='' && $adres !='' && $woonplaats !='' && $zknummer !='' && $geboortedatum !='' && $soortVerzekering !='') {
            $query = $this->db->prepare("INSERT INTO `patients` (`id`, `naam`, `huidigeMed`, `medHis`, `notes`, `adres`, `woonplaats`, `zknummer`, `geboortedatum`, `soortVerzekering`) VALUES ('', :naam, :huidigeMed, :medHis, :notes, :adres, :woonplaats, :zknummer, :geboortedatum, :soortVerzekering)");
            $query->bindParam(":naam", $naam);  
            $query->bindParam(":huidigeMed", $huidigeMed);  
            $query->bindParam(":medHis", $medHis);  
            $query->bindParam(":notes", $notes);  
            $query->bindParam(":adres", $adres);  
            $query->bindParam(":woonplaats", $woonplaats);  
            $query->bindParam(":zknummer", $zknummer);  
            $query->bindParam(":geboortedatum", $geboortedatum);  
            $query->bindParam(":soortVerzekering", $soortVerzekering);  
            $result = $query->execute();
            return $result;
        }
        return -1;
    }
//Read Patient
    public function getPatients(){
        $this->connectDb();
        $select = $this->db->query('SELECT * FROM `patients` ');
        if ($select) {
            $result=$select->fetchALL(PDO::FETCH_CLASS,Patient::class);
            return $result;
        }
        return null;
    }
//Update Patient
    public function updatePatient($id, $naam, $huidigeMed, $medHis, $notes, $adres, $woonplaats, $zknummer, $geboortedatum, $soortVerzekering){
        $this->connectDb();
        if ($naam !='' && $huidigeMed !='' && $medHis !='' && $notes !='' && $adres !='' && $woonplaats !='' && $zknummer !='' && $geboortedatum !='' && $soortVerzekering !='') {
            $query = $this->db->prepare("UPDATE `patients` SET `naam`=:naam,`huidigeMed`=:huidigeMed,`medHis`=:medHis,`notes`=:notes,`adres`=:adres,`woonplaats`=:woonplaats,`zknummer`=:zknummer,`geboortedatum`=:geboortedatum,`soortVerzekering`=:soortVerzekering WHERE `patients`.`id`=:id");
            $query->bindParam(":id", $id);  
            $query->bindParam(":naam", $naam);  
            $query->bindParam(":huidigeMed", $huidigeMed);  
            $query->bindParam(":medHis", $medHis);  
            $query->bindParam(":notes", $notes);  
            $query->bindParam(":adres", $adres);  
            $query->bindParam(":woonplaats", $woonplaats);  
            $query->bindParam(":zknummer", $zknummer);  
            $query->bindParam(":geboortedatum", $geboortedatum);  
            $query->bindParam(":soortVerzekering", $soortVerzekering);   
            $result = $query->execute();
            return $result;
        }
    }
//Delete Patient
    public function deletePatient($id){
        $this->connectDb();
        $select = $this->db->prepare('DELETE FROM `patients` WHERE `patients`.`id`=:id');
        $select->bindParam(":id", $id);
        $result = $select->execute();
        return $result;
    }
//Select Patient
    public function selectPatient($id){
        $this->connectDb();
         $select = $this->db->prepare("SELECT * FROM `patients` WHERE `patients`.`id` :id");
        $select->bindParam(":id", $id);
        $result = $select->execute();
        if ($result) {
            $select->setFetchMode(PDO::FETCH_CLASS,Patient::class);
            $patient = $select->fetch();
            return $patient;
        }
    return null;
    }    
}