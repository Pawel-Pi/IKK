<?php
  class Users extends Controller {
    private $user;

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
        } elseif($this->userModel->isLoginRegistered($data['login'])) {
          $data['login_err'] = 'Podany login jest zajęty';
        }

        if(empty($data['email'])) {
          $data['email_err'] = 'Podaj email';
        } elseif($this->userModel->isEmailRegistered($data['email'])) {
          $data['email_err'] = 'Podany adres email jest już zarejestrowany';
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
        
        if(empty($data['password'])) {
          $data['password_err'] = 'Podaj hasło';
        } elseif (!empty($data['email'] && $this->userModel->isPasswordValid($data['email'], $data['password']) == false)) {
          $data['password_err'] = 'Podano złe hasło';
        }

        if(empty($data['email'])) {
          $data['email_err'] = 'Podaj email';
        } elseif(!$this->userModel->isEmailRegistered($data['email'])) {
          $data['email_err'] = 'Podany email nie jest zarejestrowany';
          $data['password_err'] = 'Najpierw podaj prawidłowy email';
        }

        if(empty($data['email_err']) && empty($data['password_err'])) {
          $_SESSION['user_id'] = $this->userModel->getUserInfoByEmail($data['email'])->id ?: '';
          $_SESSION['user_login'] = $this->userModel->getUserInfoByEmail($data['email'])->login ?: '';
          if($_SESSION['user_id'] == '' || $_SESSION['user_login'] == '') {
            exit('Can\'t fetch user info from the database');
          }
          $_SESSION['user_email'] = $data['email'];
          redirect('recipes');
        } else {
          $this->view('users/login', $data);
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

    public function logout() {
      unset($_SESSION['user_id']);
      unset($_SESSION['user_login']);
      unset($_SESSION['user_email']);
      session_destroy();
      redirect('');
    }
  }