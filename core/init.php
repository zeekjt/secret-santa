<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'on');

const DB_USER = 'martin';
const DB_PASS = 'tit$p4mydb';
const DB_HOST = '127.0.0.1';
const DB_NAME = 'martindb';

spl_autoload_register(function($class) {
	require 'classes/' . $class . '.php';
});