<?php
/**
 * @package Cobber
 */
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
     * If $app is a closure, we wrap it in a Matey instance, otherwise we simply save it.
     */
    public function __construct($app) {

        if (is_callable($app)) {
            $app = new Matey($app);
        }

        $this->app = $app;
    
    }

    /**
     * Call the app and return the results to the server.
     */
    public function run()
    {
    }

}