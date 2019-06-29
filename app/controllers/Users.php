<?php
  class Users extends Controller {

    public function __construct() {
      $this->userModel = $this->model('User');
    }

    public function register() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //register user
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'login' => trim($_POST['login']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'login_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        if(empty($data['login'])) {
          $data['login_err'] = 'Podaj login';
        }

        if(empty($data['email'])) {
          $data['email_err'] = 'Podaj email';
        }

        if(empty($data['password'])) {
          $data['password_err'] = 'Podaj hasło';
        } elseif (strlen($data['password']) < 6) {
          $data['password_err'] = 'Hasło musi mieć conajmniej 6 znaków';
        }

        if(empty($data['confirm_password'])) {
          $data['confirm_password_err'] = 'Potwierdź hasło';
        } elseif($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Hasła nie są takie same';
        }

        if(empty($data['login_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
          //register user
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          if($this->userModel->register($data)) {
            redirect('users/login');
          } else {
            exit('Rejestracja się nie powiodła');
          }
        } else {
          //show form with errors
          $this->view('users/register', $data);
        }

        
      } else {
        //display register form
        $data = [
          'login' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'login_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];
        $this->view('users/register', $data);
      }
    }

    public function login() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //log in user
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => ''
        ];

        if(empty($data['email'])) {
          $data['email_err'] = 'Podaj email.';
        }

        if(empty($data['password'])) {
          $data['password_err'] = 'Podaj hasło';
        } elseif (!empty($data['login'] && checkPassword($data['login'], $data['password']) == false)) {
          $data['password_err'] = 'Podano złe hasło.';
        }


      } else {
        //display login form
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => ''
        ];
        $this->view('users/login', $data);
      }
    }
  }