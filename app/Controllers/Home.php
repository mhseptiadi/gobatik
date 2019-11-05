<?php
namespace Controllers;
use Resources, Models;

class Home extends Base
{    
    public function __construct()
    {
        parent::__construct();		
	}	
	
    public function index()
    {    
        $data = array();
		
		$this->slider();
		$this->getHl3();
		$this->getBox1();
		$this->getBox2();
						
        $this->output('home', $this->data);
    }
}
