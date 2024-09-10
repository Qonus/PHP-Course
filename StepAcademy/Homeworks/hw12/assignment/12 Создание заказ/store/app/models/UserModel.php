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
}