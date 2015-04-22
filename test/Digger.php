<?php

use \Cobber\Cobber;

/**
 * Override the run function so we can inspect the results rather than send them to the browser.
 */
class Digger extends Cobber
{
    public function run() {
        $this->build();
        return $this->app->call($_SERVER);
    }
}