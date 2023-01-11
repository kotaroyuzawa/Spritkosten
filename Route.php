<?php

class Route {
//https://helpincoding.com/php-routing-with-parameters/
    /*
    two parameters.

    route : route address
    file : location of the file to show if route address matched

    */
    public function add($route, $file){


        //replacing first and last forward slashes
        //$_REQUEST['uri'] will be empty if req uri is /



        if(!empty($_REQUEST['uri'])){
            $route = preg_replace("/(^\/)|(\/$)/","",$route);
            $reqUri =  preg_replace("/(^\/)|(\/$)/","",$_REQUEST['uri']);
        }else{
            $reqUri = "/";
        }

        if($reqUri == $route ){

            //on match include the file.
            include(getcwd()."/".$file);

            //exit because route address matched.
            exit();
        }

    }

    public function notFound($file){
        include($file);
        exit();
    }
}
