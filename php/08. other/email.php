<?php
/**
 * Created by PhpStorm.
 * User: phantom
 * Date: 23/07/2017
 * Time: 21:39
 */

require "vendor/autoload.php";

$transport = new \Swift_SmtpTransport('smtp.mailtrap.io', 25);
$transport
    ->setUsername('194152d5330321233')
    ->setPassword('3687a094fdbcbb');

$swift = new Swift_Mailer($transport);

$message = new Swift_Message('Всем привет!', 'Это письмо отправлено из учебного класса');
$message->setFrom('sd@freematiq.com', 'Сергей');
$message->setTo('all@freematiq.com', 'Класс');

$result = $swift->send($message);

echo "Mail sent. Result = $result\n";
