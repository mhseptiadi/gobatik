<?php
namespace Modules\Master\Controllers;
use Resources, Modules\Master;

class Login extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->login = new Master\Models\Login;
    }
    
    public function index()
    {
		$data = array();
        
        $this->output('login', $data);
    }
    
    public function check()
    {
		if(!isset($_POST['username']) || $_POST['username'] == '' || !isset($_POST['password']) || $_POST['password'] == '' )$this->redirect('master/login');
		
		$master = $this->login->check($_POST['username'],$_POST['password']);
		if($master){
			$this->session->setValue('master',$master);
			$this->redirect(MASTERHTTP);
		}else
		$this->redirect(MASTERHTTP.'login');
	}
}
