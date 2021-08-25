<?php

    include('Controller/indexController.php');
    include('config/config.php');

    $route = new Route();

    class Route {

        private $routes;
        
        public function __construct(){
            $this->initRoutes();
            $this->run($this->getUrl());

        }

        public function initRoutes(){

            //rota para a página inicial
            $this->routes['/'] = array('controller' => 'indexController', 'action' => 'goHome');
            $this->routes['/index.php'] = array('controller' => 'indexController', 'action' => 'goHome');
            
        }

        public function getURL() {

            // parse_url para site
            $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

            //parse_url para localhost
            $url = substr($url, 19, 1000);  //clonesorteiogo/www
            return $url;
        
        }

        public function run($url) {

            if(array_key_exists($url, $this->routes)) {
                $class ="\\Controller\\" . $this->routes[$url]['controller'];
                $controller = new $class();
                $action = $this->routes[$url]['action'];
                $controller->$action();
            }
            else
                echo("Erro ao acessar página.");
        }
