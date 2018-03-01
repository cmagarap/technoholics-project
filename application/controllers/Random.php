<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/13/2017
 * Time: 9:00 PM
 */

# This is just a random controller used for debugging, etc.
date_default_timezone_set("Asia/Manila");
class Random extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session'));
        $this->load->helper('string');
    }

    public function index() {
        $bytes_code = openssl_random_pseudo_bytes(30, $crypto_strong);
        $hash_code = bin2hex($bytes_code);
        echo $hash_code."<br>";
        echo password_hash($hash_code.'seej101', PASSWORD_BCRYPT);
        #$this->load->view("paper/practice_charts");

        /*$this->load->library('encryption');
        $hash = random_string('alnum', 20);
        echo "<b>This is a random string: </b>$hash<br>";
        echo "<b>SHA1: </b>".sha1('seej101')."<br>";
        echo "<b>SHA1: </b>".sha1('seej101')."<br>";
        echo sha1('customer')."<br>";
        echo sha1('vvilliam')."<br>";
        echo "<b>MD5: </b>".md5('phpsucksforever')."<br>";
        echo "<b>CRYPT: </b>".crypt('phpsucksforever', $hash)."<br>";
        echo "<b>PASSWORD_HASH (bycrypt): </b>".password_hash('phpsucksforever', PASSWORD_BCRYPT)."<br>";
        echo "<b>PASSWORD_HASH (default): </b>".password_hash('phpsucksforever', PASSWORD_DEFAULT)."<br>";
        # echo "<b>PASSWORD_HASH (argon): </b>".password_hash('phpsucksforever', PASSWORD_ARGON2I)."<br>";

        echo "<br>".$this->uri->segment(1);
        # $this->session->sess_destroy();
        echo "test<br><hr>";

        // ==========================================================================================
        $plain_text = 'This is a plain-text message!';
        $ciphertext = $this->encryption->encrypt($plain_text);

        // Outputs: This is a plain-text message! (decrypt())
        echo $this->encryption->decrypt($ciphertext)."<br>";*/
        // ==========================================================================================
        echo date("m-j-Y", 1517985368);
        echo bin2hex(openssl_random_pseudo_bytes(10));
        $some_var = '';
        if ($some_var == '')
        {
            log_message('error', 'Some variable did not contain a value.');
        }
        else
        {
            log_message('debug', 'Some variable was correctly set');
        }

        log_message('info', 'The purpose of some variable is to provide some value.');


    }
}