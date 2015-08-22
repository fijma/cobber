<?php

use \fijma\Cobber\Cobber;

class CobberTest extends PHPUnit_Framework_TestCase
{

    public function test_cobber_accepts_closures()
    {
        $expected = [200, [], ["G'day mate!"]];
        $cobber = new Digger(function($env) { return [200, [], ["G'day mate!"]];});
        $this->assertEquals($expected, $cobber->run());
    }

    public function test_cobber_accepts_app_instances()
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

    public function test_cobber_accepts_middlewares_via_add()
    {
        $expected = [200, [], ["G'day mate!", "G'day cobber!"]];
        $app = new Digger('GiveItABurl');
        $app->add('Gaffer');
        $this->assertEquals($expected, $app->run());
    }

    public function test_cobber_accepts_middlewares_on_instantiation()
    {
        $expected = [200, [], ["G'day mate!", "Alright Gaffer?"]];
        $app = new Digger('GiveItABurl', [['Gaffer', ["Alright Gaffer?"]]]);
        $this->assertEquals($expected, $app->run());
    }

    public function test_cobber_keeps_the_order_of_middlewares_right()
    {
        $expected = [200, [], ["G'day mate!", "Alright Gaffer?", "G'day cobber!"]];
        $app = new Digger('GiveItABurl', [['Gaffer', ["G'day cobber!"]]]);
        $app->add('Gaffer', ["Alright Gaffer?"]);
        $this->assertEquals($expected, $app->run());
    }

}