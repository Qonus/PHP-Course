<?php

class UserModel extends Model {
    protected $db;
    protected $table = "users";

    public function authUser($email, $password): ?array {
        $sql = "SELECT * FROM users WHERE email LIKE :email AND password = :password";
        $args = [
            ":email" => $email,
            ":password" => $password
        ];
        return (array)$this->db->getRow($sql, $args) ?: null;
    }

    public function registerUser($data) {
        $sql = "SELECT * FROM users WHERE email LIKE :email";
        $args = [
            ":email" => $data['email']
        ];
        if ((array)$this->db->getRow($sql, $args) ?: null) {
            return 0;
        }
        $sql = "INSERT INTO users (user_type, first_name, last_name, email, phone, password) VALUES (:user_type, :first_name, :last_name, :email, :phone, :password)";
        return $this->db->insert($sql, $data);
    }
}

?>