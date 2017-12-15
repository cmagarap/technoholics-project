<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/13/2017
 * Time: 9:00 PM
 */
# This is just a random controller used for debugging, etc.
class Random extends CI_Controller {
    public function index() {
        echo sha1('seej101');
    }
}