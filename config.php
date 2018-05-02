<?php
return array(
    'host' => 'localhost',
    'name' => 'movietheater',
    'user' => 'root',
    'pass' => 'root',
    'options' => array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8 ',
    ),
    'tokenKey' => 'Auth-Token'
);
?>