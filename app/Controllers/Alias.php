<?php
namespace Controllers;
use Resources, Models;

class Alias extends Base
{    
    public function __construct(){
        
        parent::__construct();
	
	}
	
    public function index()
    {    
        $data = array();
        
        $dir    = '../app/Controllers';
		$this->controllers = scandir($dir);
		$this->args = func_get_args();
		
		$this->redirect('error'); 
		
    }
}
