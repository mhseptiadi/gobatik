<?php
namespace Controllers;
use Resources, Models;

class Error extends Base
{    
	public function __construct()
    {
        parent::__construct();
	}	
	
    public function index()
    {   
        $this->output('errors/404', $this->data);
    }
    
    public function message($message)
    {   
        $this->data['message'] = $message;
        $this->output('errors/error', $this->data);
    }
}
