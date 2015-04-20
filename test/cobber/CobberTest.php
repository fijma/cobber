<?php

class CobberTest extends PHPUnit_Framework_TestCase
{

    public function test_cobber_run()
    {

        $this->assertEquals(1, 2);

        $expected = [200, [], ["G'day mate!"]];

        $app = new Cobber(function($env) { return [200, [], ["G'day mate!"]]; });
        
        ob_start();
        $app->run();
        $headers = xdebug_get_headers();
        print_r($headers);
        $body = ob_get_clean();


    }

}

?>