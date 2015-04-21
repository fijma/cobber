<?php
/**
 * @package Cobber
 */
namespace Cobber;

/**
 * Matey helps Cobber out by turning a closure into a valid Cobber app.
 */
class Matey
{

    private $closure;

    public function __construct($closure)
    {
        $this->closure = $closure;
    }

    public function call($env)
    {
        $closure = $this->closure;
        return $closure($env);
    }

}