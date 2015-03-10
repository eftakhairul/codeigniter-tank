<?php

class MY_Form_validation extends CI_Form_validation
{
    public function  __construct ()
    {
        parent::__construct();
        $this->set_error_delimiters('','');
    }
    
    public function setRulesForSignIn()
    {
        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|alpha'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            )
        );

        $this->set_rules($config);
    }
}