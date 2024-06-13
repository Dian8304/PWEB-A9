<?php

class App {
    protected $controller = 'auth';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();
        
        // Controller
        if ($url == NULL) {
            $url[2] = $this->controller;
        }

        // Mengecek apakah ada nama file php di controllers yang sesuai dengan keyword pertama pada url
        if (file_exists('./app/controllers/' .$url[2] . '.php')) {
            $this->controller = $url[2]; // Menjadikan url[2] sebagai controller
            unset($url[2]);
        }

        require_once './app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method
        if (isset($url[3])){
            if(method_exists($this->controller, $url[3])){
                $this->method = $url[3];
                unset($url[3]);
            }
        }

        // Params
        if(!empty($url)) {
            $this->params = array_values($url);
        }

        // Jalankan controller & method, serta kirim params jka ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Ambil url diisi dengan url
    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/'); // Menghilangkan slice di belakang
            // var_dump($url);
            $url = filter_var($url, FILTER_SANITIZE_URL); // Memfilter url agar bersih dari karakter aneh
            // var_dump($url);
            $url = explode('/', $url); // Memecah url dari tiap slice
            // print_r($url);
            return $url;
        }
    }
}