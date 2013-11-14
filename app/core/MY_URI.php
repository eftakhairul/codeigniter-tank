<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * MY_URI
 *
 * Extended the core CI_URI class in order to some functions.
 *
 */
class MY_URI extends CI_URI
{

	public function __construct()
	{
        //Calling the parent constructor
		parent::__construct();
	}

    /**
     * It take integer value and return the exact value of that integer position
     *
     * @param $segmentValue
     * @return int
     */
    public function getSegmentIndex($segmentValue)
	{
		$keyArray = array_keys($this->segment_array(), $segmentValue);

		if (empty($keyArray[0])) return -1;
		return $keyArray[0];
	}

    /**
     * It adds "/" before  assoc_to_uri function
     *
     * @param array $data
     * @return string
     */
    public function assoc_to_uri($data)
	{
		return '/' . parent::assoc_to_uri($data);
	}
}