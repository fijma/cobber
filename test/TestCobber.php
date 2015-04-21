<?php
/**
 * @package Cobber
 */
use \Cobber\Cobber;

/**
 * Override the run function so we can inspect the results rather than send them to the browser.
 */
class TestCobber extends Cobber
{
    public function run() {
        return $this->app->call($_SERVER);
    }
}