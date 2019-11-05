<?php
namespace Modules\Master\Controllers;
use Resources, Models;

class Alias extends \Controllers\Base
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
		
		if(!in_array($this->args,$this->controllers)) $this->redirect('error'); 
		
    }
}
