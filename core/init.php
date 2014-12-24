<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'ON');

const DB_HOST = 'localhost';
const DB_NAME = 'martindb';
const DB_USER = 'martin';
const DB_PASS = 'tit$p4mydb';

spl_autoload_register(function($class){
	require_once 'classes/' . $class . '.php';
});