<?php

class MY_Form_validation extends CI_Form_validation
{
    public function  __construct ()
    {
        parent::CI_Form_validation();
        $this->set_error_delimiters('','');
    }

    public function setRulesForBlogPost()
    {
        $config = array(
            array(
                'field' => 'title',
                'label' => 'the title',
                'rules' => 'required'
            ),
            array(
                'field' => 'description',
                'label' => 'the description',
                'rules' => 'required'
            ),
        );

        $this->set_rules($config);
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