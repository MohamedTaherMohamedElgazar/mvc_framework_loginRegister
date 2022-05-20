<?php


// Core app class
class Core {
    // default accessories
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];


    // contructor magic method called after instaniating directly
    public function __construct() {
        // get the values of array and store it (should have values/added to url)
        $url = $this->getUrl();


        // checking if we have a controller named like the url or not
        // And if we found the instanse will be changes
        // And if not we remain by default controller 'Pages'
        if(file_exists('../app/controllers/'. ucwords($url[0]) . '.php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        // requiring Controller_file_Content and instaniate it
        require_once('../app/controllers/' . $this->currentController . '.php');
        $this->currentController = new $this->currentController;

        // check if there's another url(1) after backslash (glasses)
        if(isset($url[1])){
            // checking if the object of controller has a method defined in url(1)
            // And if we found change the value of variable
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // filling params with values of array or keep it empty
        $this->params = $url ? array_values($url) : [];

        // call a callback function
        call_user_func_array([$this->currentController, $this->currentMethod],$this->params);

    }


    // method to get what is inside url to store it in params array
    public function getUrl(){
        if(isset($_GET['url'])){
            // trim according to backslash to remove whitespaces
            $url = rtrim($_GET['url'], '/');
            // filter url according to string & numbers
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // make an array of url 
            $url = explode('/', $url);

            return $url;
        }
    }
}




?>