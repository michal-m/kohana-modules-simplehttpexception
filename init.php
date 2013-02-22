<?php defined('SYSPATH') or die('No direct script access.');

if (PHP_SAPI != 'cli' AND Kohana::$config->load('simplehttpexception')->get('autoload'))
{
    Kohana_Exception::$error_view = 'simplehttpexception/plain';
}
