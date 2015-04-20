<?php

use \Cobber\Cobber;

class CobberTest extends PHPUnit_Framework_TestCase
{

    public function test_cobber_run()
    {


        $expected = [200, [], ["G'day mate!"]];

        $app = new Cobber(function($env) { return [200, [], ["G'day, mate!"]]; });
        $app->run();
        var_dump(headers_list());
        $body = ob_end_clean();
        
    }

}

?>