<?php

namespace mvc\model;

class User
{
    private $id;
    private $first_name;
    private $last_name;
    private $company_name;
    private $password;
    private $email;
    private $phone_number;
    private $street_name;
    private $zip_code;
    private $date_of_birth;
    private $role;
    
    public function getId(){
        return $this->id;
    }
    public function getfirst_name(){
        return $this->first_name;
    }
    public function getlast_name(){
        return $this->last_name;
    }
    public function getcompany_name(){
        return $this->company_name;
    }
    public function getpassword(){
        return $this->password;
    }
    public function getemail(){
        return $this->email;
    }
    public function getphone_number(){
        return $this->phone_number;
    }
    public function getstreet_name(){
        return $this->street_name;
    }
    public function getzip_code(){
        return $this->zip_code;
    }
    public function getdate_of_birth(){
        return $this->date_of_birth;
    }
    public function getRole(){
        return $this->role;
    }
}


