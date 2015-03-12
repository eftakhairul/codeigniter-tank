<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH . "controllers/BaseController.php";

/**
 * Class Tool Controller
 *
 * @author Eftakhairul Islam
 */
class ToolController extends BaseController {


	public function __construct()
	{
		$this->load->library("migration");
	}


	/**
	 * Run all migration of system
	 *
	 *
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function migrate()
	{		

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */