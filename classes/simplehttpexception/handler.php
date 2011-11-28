<?php defined('SYSPATH') or die('No direct script access.');

/**
 * The Exception Handler class
 *
 * @package		SimpleHTTPException
 * @author		Michał Musiał
 * @copyright	(c) 2011 Michał Musiał
 */
class SimpleHTTPException_Handler
{
	/**
	 * @param Exception $e
	 * @return mixed
	 */
	public static function handle(Exception $e)
	{
		$view = new View(Kohana::$config->load('simplehttpexception')->get('default_view'));
		$response = new Response;
		$exception_class = get_class($e);
		
		if (strpos(strtolower($exception_class), 'http_exception') === FALSE)
		{
			// Return default Kohana_Exception if it is not http_exception
			return Kohana_Exception::handler($e);
		}
		
		// Get exception code
		$error_code = (int) substr($exception_class, -3);
		// Set template strings
		$view->title = Response::$messages[$error_code];
		$view->message = $e->getMessage();
		// Prepare and sent the response
		$response->status($error_code);
		echo $response->body($view)->send_headers()->body();
		return TRUE;		
	}
}
