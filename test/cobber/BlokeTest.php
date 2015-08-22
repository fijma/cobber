<?php

use \fijma\Cobber\Bloke;

class blokeTest extends PHPUnit_Framework_TestCase
{

    public function test_bloke_returns_http_status_codes()
    {
        $expected = 'HTTP/1.1 200 OK';
        $this->assertEquals($expected, Bloke::get_status_code(200));
    }

    public function test_bloke_returns_null_if_no_status_code()
    {
        $this->assertNull(Bloke::get_status_code(7));
    }

}
