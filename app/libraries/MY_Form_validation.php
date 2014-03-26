<?php

class MY_Form_validation extends CI_Form_validation
{
    public function  __construct ()
    {
        parent::__construct();
        $this->set_error_delimiters('','');        
    }

    public function setRulesForCreateSeason()
    {
        $config = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'start_date',
                'label' => 'Start date',
                'rules' => 'required'
            ),
            array(
                'field' => 'end_date',
                'label' => 'End date',
                'rules' => 'required'
            )
        );

        $this->set_rules($config);
    }

    public function setRulesForCreateEpisode()
    {
        $config = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'date',
                'label' => 'Episode date',
                'rules' => 'required'
            ),
            array(
                'field' => 'season_id',
                'label' => 'Season',
                'rules' => 'required'
            )
        );

        $this->set_rules($config);
    }
    
    public function setRulesForSignIn()
    {
        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            )
        );

        $this->set_rules($config);
    }

    
    public function setRulesForCreateQuestion()
    {
        $config = array(

            array(
                'field' => 'episode_id',
                'label' => 'Episode',
                'rules' => 'required'
            ),
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'question_number',
                'label' => 'Question number',
                'rules' => 'required||callback_questionNumber_check'
            ),
            array(
                'field' => 'start_date',
                'label' => 'Start date',
                'rules' => 'required'
            ),
            array(
                'field' => 'start_time',
                'label' => 'Start Time',
                'rules' => 'required'
            ),
            array(
                'field' => 'end_date',
                'label' => 'End date',
                'rules' => 'required'
            ),
            array(
                'field' => 'end_time',
                'label' => 'End time',
                'rules' => 'required'
            ),
            array(
                'field' => 'is_multiple',
                'label' => 'Multiple',
                'rules' => 'required'
            )
        );

        $this->set_rules($config);
    }

    public function setRulesForCreateSms()
    {
        $config = array(
            array(
                'field' => 'code',
                'label' => 'Code',
                'rules' => 'required'
            ),
            array(
                'field' => 'message',
                'label' => 'Messages',
                'rules' => 'required'
            ));

        $this->set_rules($config);
    }

    public function setRulesForCreateOption()
    {
        $config = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'mark',
                'label' => 'Mark',
                'rules' => 'required'
            ));

        $this->set_rules($config);
    }
}