<?php

/**
 * Base Controller
 *
 * Common tasks of all controllers are done here. All controller must inherit it rather than CI_Controller.
 *
 * @package     Base
 * @category    Controller
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */
include_once APPPATH . "libraries/DateHelper.php";
include_once APPPATH . "libraries/DbHelper.php";
include_once APPPATH . "libraries/RefactorHelper.php";

abstract class BaseController extends CI_Controller
{
	protected $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->prepareEnvironment();
		$this->populateFlashData();
        $this->data['flag']     = 'home';
        $userName               = $this->session->userdata('userName');
        $this->data['userName'] = empty($userName)? false : $userName;
	}

	protected function prepareEnvironment()
	{
		$this->load->library('Layout');
		parse_str($_SERVER['QUERY_STRING'], $_GET);
	}

    /**
     * This is required for activate flash data in project
     * If you need flash data, Just remove from constactor
     */
    protected function populateFlashData()
	{
		$notify['message']      = $this->session->flashdata('message');
		$notify['messageType']  = $this->session->flashdata('messageType');

		$this->data['notification'] = $notify;
	}

    /**
     * Redirect to provided URL with message while one event success
     *
     * @param $redirectLink
     * @param $message
     */
    protected function redirectForSuccess($redirectLink, $message)
    {
        $this->session->set_flashdata('message', $message);
        $this->session->set_flashdata('messageType', 'success');
        redirect($redirectLink);
    }

    /**
     * Redirect to provided URL with message while one event fails
     *
     * @param $redirectLink
     * @param $message
     */
    protected function redirectForFailure($redirectLink, $message)
    {
        $this->session->set_flashdata('message', $message);
        $this->session->set_flashdata('messageType', 'errormsg');
        redirect($redirectLink);
    }

    /**
     * Check username that does it exists in DB or not
     *
     * @param $username
     * @return bool
     */
    public function username_check($username)
    {
        $this->load->model('users');
        if(!$this->users->checkUsernameExisted($username)){
             return true;
         } else {
             return false;
         }
    }

    /**
     * Validate login or redirect to login page
     *
     * @return mixed
     */
    protected function prepareLogin()
    {
        if (!$this->session->userdata('userId')) {
            redirect('auth/fbLogin');
        }

        return $this->session->userdata('userId');
    }
}