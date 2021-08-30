<?php

    include('Controller/indexController.php');
    include('config/config.php');

    $route = new Route();

    class Route {

        private $routes;
        
        public function __construct() {

            $this->initRoutes();
            $this->run($this->getUrl());

        }

        public function initRoutes() { 

             //---------------------------------- ROTAS DE DIRECIONAMENTO DE PÁGINA----------------------------------//
            //
            $this->routes['/'] = array('controller' => 'indexController', 'action' => 'goHome');
            $this->routes['/home'] = array('controller' => 'indexController', 'action' => 'goHome');
            $this->routes['/sorteionumeros'] = array('controller' => 'indexController', 'action' => 'goSorteioNumeros');
            $this->routes['/sorteionomes'] = array('controller' => 'indexController', 'action' => 'goSorteioNomes');
            $this->routes['/sorteioamigo'] = array('controller' => 'indexController', 'action' => 'goSorteioAmigo');


            
             //---------------------------------- ROTAS PARA EXECUÇÃO DE FUNÇÕES----------------------------------//
            $this->routes['/sortearnumeros'] = array('controller' => 'indexController', 'action' => 'sortearNumeros');
            $this->routes['/sortearnomes'] = array('controller' => 'indexController', 'action' => 'sortearNomes');
        }

        public function getURL() {

            // parse_url para site
            $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
            //parse_url para localhost
            $url = substr($url, 19, 1000); 
            return $url;
            
        }
    
        public function run($url) {

            if(array_key_exists($url, $this->routes)) {
                $class ="\\Controller\\" . $this->routes[$url]['controller'];
                $controller = new $class();
                $action = $this->routes[$url]['action'];
                $controller->$action();
            }
        }


    }
