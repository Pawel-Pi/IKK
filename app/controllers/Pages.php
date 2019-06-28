<?php
    class Pages extends Controller {
        private $postModel;

        public function __construct() {
            
        }

        public function index() {
            $data = [
                'title' => 'Start'
            ];
            $this->view('pages/index', $data);
        }

        public function recipes() {
            $data = [
                'cat_navbar' => true,
                'title' => 'Przepisy'
            ];
            $this->view('pages/recipes', $data);
        }
    }