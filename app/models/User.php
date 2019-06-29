<?php
  class User extends Database {

    public function __construct() {
      $this->db = new Database();
    }

    public function register($data) {
      $this->db->query('INSERT INTO users (login, email, password) VALUES (:login, :email, :password)');
      $this->db->bind(':login', $data['login']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function isLoginRegistered($login) {
      $this->db->query('SELECT login FROM users WHERE login = :login');
      $this->db->bind(':login', $login);
      $result = $this->db->single();
      if(!empty($result) && $result->login == $login) {
        return true;
      }
      return false;
    }
      
    public function isEmailRegistered($email) {
      $this->db->query('SELECT email FROM users WHERE email = :email');
      $this->db->bind(':email', $email);
      $result = $this->db->single();
      if(!empty($result) && $result->email == $email) {
        return true;
      }
      return false;
    }
        
    public function isPasswordValid($email, $password) {
      $this->db->query('SELECT email, password FROM users WHERE email = :email');
      $this->db->bind(':email', $email);
      $result = $this->db->single();
      if(!empty($result) && password_verify($password, $result->password)) {
        return true;
      }
      return false;
    }     

    public function getUserInfoByEmail($email) {
      $this->db->query('SELECT id, login FROM users WHERE email = :email');
      $this->db->bind(':email', $email);
      $result = $this->db->single();
      if(!empty($result)) {
        return $result;
      } else {
        return false;
      }
    }
  }