<?php

/**
 * REST Service Controller
 *
 * @method      This class only for implementing Rest Api. It can remap method according to request method
 *              All controller those serve rest api inherit it in stead of BaseController or CI_Controller
 *
 * @category    Controller
 * @author      Eftakhairul Islam <eftakhairul@gmail.com> (http://eftakhairul.com)
 */
include_once APPPATH . "controllers/BaseController.php";

abstract class RestController extends BaseController
{
    private $requestVars;
	private $method;

	public function __construct()
	{
		parent::__construct();
	}

    public function setData($data)
	{
		$this->data = $data;
	}

	public function setMethod($method)
	{
		$this->method = $method;
	}

	public function setRequestVars($requestVars)
	{
		$this->requestVars = $requestVars;
	}

	public function getData()
	{
		return $this->data;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function getRequestVars()
	{
		return $this->requestVars;
	}

    public function getStatusCodeMessage($status)
	{
		$codes = Array(
		    100 => 'Continue',
		    101 => 'Switching Protocols',
		    200 => 'OK',
		    201 => 'Created',
		    202 => 'Accepted',
		    203 => 'Non-Authoritative Information',
		    204 => 'No Content',
		    205 => 'Reset Content',
		    206 => 'Partial Content',
		    300 => 'Multiple Choices',
		    301 => 'Moved Permanently',
		    302 => 'Found',
		    303 => 'See Other',
		    304 => 'Not Modified',
		    305 => 'Use Proxy',
		    306 => '(Unused)',
		    307 => 'Temporary Redirect',
		    400 => 'Bad Request',
		    401 => 'Unauthorized',
		    402 => 'Payment Required',
		    403 => 'Forbidden',
		    404 => 'Not Found',
		    405 => 'Method Not Allowed',
		    406 => 'Not Acceptable',
		    407 => 'Proxy Authentication Required',
		    408 => 'Request Timeout',
		    409 => 'Conflict',
		    410 => 'Gone',
		    411 => 'Length Required',
		    412 => 'Precondition Failed',
		    413 => 'Request Entity Too Large',
		    414 => 'Request-URI Too Long',
		    415 => 'Unsupported Media Type',
		    416 => 'Requested Range Not Satisfiable',
		    417 => 'Expectation Failed',
		    500 => 'Internal Server Error',
		    501 => 'Not Implemented',
		    502 => 'Bad Gateway',
		    503 => 'Service Unavailable',
		    504 => 'Gateway Timeout',
		    505 => 'HTTP Version Not Supported'
		);

		return (isset($codes[$status])) ? $codes[$status] : '';
	}

    public function _remap($method, $arguments)
    {
        try {

            $this->setMethod( strtolower($_SERVER['REQUEST_METHOD']) );
            $controllerMethod = $method .'_'. $this->getMethod();

            call_user_func_array(array($this, $controllerMethod), $arguments);
        }
        catch (Exception $e) {
            redirect('error');
        }
    }

    public function sendResponse($status = 200, $body = null, $content_type = 'application/json')
	{
		$status_header = 'HTTP/1.1 '. $status .' '. $this->getStatusCodeMessage($status);

		header($status_header);
		header('Content-type: ' . $content_type);

        if (!empty($body)) {
            echo $body;
			exit;
		} else {
			$message = '';

			switch($status)
			{
				case 401:
					$message = 'You must be authorized to view this page.';
					break;
				case 404:
					$message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
					break;
				case 500:
					$message = 'The server encountered an error processing your request.';
					break;
				case 501:
					$message = 'The requested method is not implemented.';
					break;
			}

			$signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

			$body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
						<html>
							<head>
								<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
								<title>' . $status . ' ' . $this->getStatusCodeMessage($status) . '</title>
							</head>
							<body>
								<h1>' . $this->getStatusCodeMessage($status) . '</h1>
								<p>' . $message . '</p>
								<hr />
								<address>' . $signature . '</address>
							</body>
						</html>';

			echo $body;
			exit;
		}
    }
}