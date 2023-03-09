<?php

declare(strict_types=1);
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

class Core
{
    public function __construct()
    {
        $url = $this->getUrl();
        //redirect to homepage
        if (!isset($url[0]) || $url[0] === 'home') {
            require 'index.html';
            die();
        }

        // Look in controllers for first value
        if (file_exists('controllers/' . ucwords($url[0]). '.php')) {
            // If exists, set as controller
            $currentController = ucwords($url[0]);
            $currentMethod = $url[1];

            require_once 'controllers/'. $currentController . '.php';
            $controller = new $currentController;
            $controller($currentMethod);
        } else {
            require 'views/src/404.html';
            die();
        }
    }

    private function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);

            return $url = explode('/', $url);
        }
    }
}

