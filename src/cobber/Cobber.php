<?php

namespace Cobber;

/**
 * Builds the application stack, runs it, and outputs the results to the server.
 */
class Cobber
{

    /**
     * This is the end point of the application stack.
     */
    protected $app;

    /**
     * These are the middlewares we are going to run.
     */
    protected $middlewares;

    /**
     * If $app is a closure, we wrap it in a Matey instance.
     * If $app is a string, we instantiate it.
     * Otherwise we just save it.
     */
    public function __construct($app, $middlewares = array())
    {
        if (is_callable($app)) {
            $app = new Matey($app);
        }
        if (is_string($app)) {
            $app = new $app();
        }
        $this->app = $app;
        $this->middlewares = $middlewares;
    }

    /**
     * Add a middleware to the stack.
     */
    public function add($middleware, $options = array())
    {
        if (empty($options)) {
            $this->middlewares[] = $middleware;
        } else {
            $this->middlewares[] = [$middleware, $options];
        }
    }

    /**
     * Call the app and return the results to the server.
     */
    public function run()
    {
        $this->build();
        list($status, $headers, $body) = $this->app->$run($_SERVER);

        $http_status_code = Bloke::get_status_code($status);
        if(!is_null($http_status_code)) $this->send_header($http_status_code);
        
        foreach($headers as $header) {
            $this->send_header($header);
        }
        
        $body = implode('', $body);
        echo $body;
    }

    /**
     * Build the application stack.
     * If a middleware is just a string, instantiate it.
     * If a middleware is an array, instantiate it with options.
     */
    protected function build()
    {
        $middlewares = array_reverse($this->middlewares);
        foreach ($middlewares as $middleware) {
            if (is_string($middleware)) {
                $this->app = new $middleware($this->app);
            } else {
                $this->app = new $middleware[0]($this->app, $middleware[1]);
            }
        }
    }

    /**
     * Send a header.
     */
    protected function send_header($header)
    {
        if (is_string($header)) {
            header($header);
        } elseif (is_array($header)) {
            switch (count($header)) {
                case 0:
                    throw new Exception('Received empty array for header.');
                    break;
                case 1:
                    header($header[0]);
                    break;
                case 2:
                    header($header[0], $header[1]);
                    break;
                case 3:
                    header($header[0], $header[1], $header[2]);
                    break;
            }
        }
    }

}