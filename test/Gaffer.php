<?php

class Gaffer
{

    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function call($env) 
    {
        list($status, $headers, $body) = $this->app->call($env);
        $body[] = "G'day cobber!";
        return [$status, $headers, $body];
    }

}