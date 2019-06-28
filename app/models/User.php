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
  }