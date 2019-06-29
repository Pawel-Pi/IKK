<?php
    /*
    * URL format - /controller/method/params
    */

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = []; //pusta tablica
        private $fileLoaded = false;

        public function __construct() {
            //get controller name
            $url = $this->getUrl();

            //get parameters
            $this->params = $url ? array_values($url) : [];

            //$url[0] - controller requested by POST
            //$url[1] - method requested by POST
            if(isset($url[0]) && file_exists('../app/controllers/' . $url[0] . '.php')) {
                require_once '../app/controllers/' . $url[0] . '.php';
                if(isset($url[1]) && method_exists(new $url[0], $url[1])) {
                    $this->currentController = $url[0];
                    $this->currentMethod = $url[1];
                    $this->fileLoaded = true;
                }
            }

            if(!$this->fileLoaded) {
                require_once '../app/controllers/Pages.php';
            }

            //call function with parameters from the URL
            call_user_func_array([new $this->currentController, $this->currentMethod],
                $this->params);
        }

        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url); //creates array
                return $url;
            }
        }
    }