<?php

class User extends db_conn_mysql {

    public function login($user_email, $user_password){
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM user_accounts WHERE email = ? AND password = ?");
        $query->execute([$user_email, $user_password]);
        $response = $query->fetch();

        return ($response) ?: false;
    }
    
}