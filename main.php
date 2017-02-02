<?php
/**
 * Created by PhpStorm.
 * User: Vardan
 * Date: 31.01.2017
 * Time: 15:52
 */
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$email ($name, $email, $message);

echo  "Your message has been sent";
