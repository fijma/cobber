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
    public function __construct($app)
    {
        if (is_callable($app)) {
            $app = new Matey($app);
        }
        if (is_string($app)) {
            $app = new $app();
        }
        $this->app = $app;
    }

    /**
     * Add a middleware to the stack.
     */
    public function add($middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * Call the app and return the results to the server.
     */
    public function run()
    {
    }

}