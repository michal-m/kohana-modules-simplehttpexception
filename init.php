<?php defined('SYSPATH') or die('No direct script access.');

if (PHP_SAPI != 'cli' AND Kohana::$config->load('simplehttpexception')->get('autoload'))
{
	/**
	 * Set as the default exception hanlder
	 */
	set_exception_handler(array('SimpleHTTPException_Handler', 'handle'));
}