<?php

class User extends db_conn_mysql {

    public function login($user_email, $user_password){
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM user_accounts WHERE email='$user_email' AND password='$user_password'");
        $query->execute();
        $response = $query->fetch();

        return ($response) ?: false;
    }
    
}