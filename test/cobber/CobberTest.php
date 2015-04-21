<?php

use \Cobber\Cobber;

class CobberTest extends PHPUnit_Framework_TestCase
{

    public function test_cobber_accepts_closures()
    {
        $expected = [200, [], ["G'day mate!"]];
        $cobber = new Digger(function($env) { return [200, [], ["G'day mate!"]];});
        $this->assertEquals($expected, $cobber->run());
    }

    public function test_cobber_accepts_apps()
    {
        $expected = [200, [], ["G'day mate!"]];
        $app = new GiveItABurl();
        $cobber = new Digger($app);
        $this->assertEquals($expected, $cobber->run());
    }

    public function test_cobber_accepts_strings()
    {
        $expected = [200, [], ["G'day mate!"]];
        $app = 'GiveItABurl';
        $cobber = new Digger($app);
        $this->assertEquals($expected, $cobber->run());
    }

}