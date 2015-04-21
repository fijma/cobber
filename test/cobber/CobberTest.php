<?php
/**
 * @package Cobber
 */
use \Cobber\Cobber;

class CobberTest extends PHPUnit_Framework_TestCase
{

    public function test_cobber_accepts_closures()
    {

        $expected = [200, [], ["G'day mate!"]];
        $cobber = new TestCobber(function($env) { return [200, [], ["G'day mate!"]];});
        $this->assertEquals($expected, $cobber->run());

    }

}