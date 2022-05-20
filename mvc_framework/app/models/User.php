<?php

class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // public function getUsers(){
    //     $this->db->query("SELECT * FROM users");
    //     $result = $this->db->result();
    //     return $result;
    // }

    public function findUserByEmail($email){
        $this->db->query("SELECT * FROM userslog where user_email = :email");
        $this->db->bind(':email',$email);
        if($this->db->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }


    public function register($data){
        $this->db->query("INSERT INTO userslog (user_name,user_email,password) values (:username,:email,:password)");

        $this->db->bind(':username',$data['username']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);


        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }


    // log in functionality
    public function login($username,$password){
        $this->db->query("SELECT * FROM userslog where user_name = :username");

        $this->db->bind(':username',$username);


        $row = $this->db->singleResult();


        $hashed_password = $row->password;


        // check if there's a match
        if(password_verify($password,$hashed_password)){

            return $row;

        }else{
            return false;
        }
    }


}


?>