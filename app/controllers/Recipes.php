<?php
  class Recipes extends Controller {

    public function add() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      } else {
        $data = [
          'category' => '',
          'title' => '',
          'ingrediens' => '',
          'body' => ''
        ];
        $this->view('recipes/add');
      }
    }

  }