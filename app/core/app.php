<?php

/*Create Flexi-Hires Router */

class App
{
    private $controller = "home"; //default controller
    private $method = "index"; //default method
    private $params = []; //variables

    public function __construct() //Initialises the App
    {

        $url = $this->splitURL();

        if (file_exists("../app/controllers/" . strtolower($url[0]) . ".php")) {
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }

        require "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //run the class and method
        $this->params = array_values($url);
        call_user_func_array([$this->controller, $this->method], $this->params); //Runs Class
    }

    private function splitURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        //Explode converts string to array and splits between '/' character
        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
    }
}