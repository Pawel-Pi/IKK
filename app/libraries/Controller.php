<?php

// base controller loads the models and views

    class Controller {
        
        public function model($model) {
            require_once '../app/models/'.$model.'.php';
            return new $model(); // zwraca utworzony obiekt $model
        }

        public function view($view, $data = []) {
            if(file_exists('../app/views/'.$view.'.php')) {
                require_once '../app/views/'.$view.'.php';
            } else {
                exit('View "'.$view.'.php" does not exist');
            }
        }
    }