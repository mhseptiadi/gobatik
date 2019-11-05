<?php
namespace Controllers;
use Resources, Models;

class Subscribe extends Base
{    
    public function __construct()
    {
        parent::__construct();		
        $this->config = Resources\Config::main();
        $this->subscribe = new \Models\Subscribe;
	}	
	
    public function index()
    {    
		$this->redirect('home');
    }
    
	public function add(){
        $data = $this->subscribe->add($_POST);
        $this->data['headWord'] = 'Add subsribe '.$data['status'];
        $this->data['form'] = $data['message'];
        $this->data['footWord'] = '';
		$this->output('basic',$this->data);
    }
}
