<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/13/2017
 * Time: 9:00 PM
 */
# This is just a random controller used for debugging, etc.
class Random extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
        $this->load->helper('string');
    }

    public function index() {
        $this->load->library('encryption');
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
        echo "<b>PASSWORD_HASH (default): </b>".password_hash('phpsucksforever', PASSWORD_DEFAULT)."<br>";
        echo $this->uri->segment(1);
        # $this->session->sess_destroy();
        echo "test<br><hr>";

        // ==========================================================================================
        $plain_text = 'This is a plain-text message!';
        $ciphertext = $this->encryption->encrypt($plain_text);

        // Outputs: This is a plain-text message! (decrypt())
        echo $this->encryption->decrypt($ciphertext)."<br>";
        // ==========================================================================================

        # To set the password:
        # setPassword($passwordString, $user_table, $saltFromDB, $columnForUserID, $user_id)
        $password = $this->item_model->setPassword("qwertyuiop123", "admin", "verification_code", "admin_id", 2);
        echo "<b>This is the password:</b> $password<br>";

        # To check, get the salt first:
        # getSalt($user_table, $saltFromDB, $columnForUserID, $user_id)
        $salt = $this->item_model->getSalt("admin", "verification_code", "admin_id", 2);
        echo "<b>This is the salt:</b> $salt<br>";

        # To verify:
        # password_verify($stringToBeTested, $actualPassword)
        if(password_verify($salt."qwertyuiop123", $password)) {
            echo "<br><b style = 'color: green'><u>EQUAL</u></b>";
        } else {
            echo "<br><b style = 'color: red'>NOT EQUAL</b>";
        }

        echo "<br><pre>";
        $bytes = openssl_random_pseudo_bytes(30, $crypto_strong);
        $hex = bin2hex($bytes); # length of hex is double the bytes
        # var_dump($hex);
        # var_dump($crypto_strong);
        echo $hex."</pre>";

    }
}