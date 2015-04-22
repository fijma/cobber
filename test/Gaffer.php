<?php

class Gaffer
{

    private $app;
    private $message;

    public function __construct($app, $options = array())
    {
        $this->app = $app;
        if (empty($options)) {
            $this->message = "G'day cobber!";
        } else {
            $this->message = implode("", $options);
        }
    }

    public function call($env) 
    {
        list($status, $headers, $body) = $this->app->call($env);
        $body[] = $this->message;
        return [$status, $headers, $body];
    }

}