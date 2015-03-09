<?php

/*
 * MY_URI
 *
 * Extended the core CI_URI class in order to add two extra methods
 * 
 * Eftakhairul Islam <eftakhairul@gmail.com> 
 */
class MY_URI extends CI_URI
{
    protected $values = array();

    public function MY_URI()
    {
         parent::__construct();
    }

    public function getSegmentIndex($segmentValue)
    {
        $keyArray = array_keys($this->segment_array(), $segmentValue);
        if (empty ($keyArray[0])) {
            return -1;
        }
        return $keyArray[0];
    }

    public function assoc_to_uri($data)
    {
        return '/' . parent::assoc_to_uri($data);
    }
}