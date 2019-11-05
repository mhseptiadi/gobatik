<?php
namespace Controllers;
use Resources, Models;

class Login extends Base
{    
    public function __construct()
    {
        parent::__construct();		
        $this->config = Resources\Config::main();
	}	
	
    public function index()
    {
		$this->data['headWord'] = 'Login';    
		$this->data['footWord'] = '<p>Don\'t have an account? <a href="'.SITE.'register">Register</a></p>';    
		$this->data['form'] = $this->output('box/login',array(),true);    
        
        $this->data['titleTag'] = $this->config['siteName'].' - Login';
        $this->data['tagOgTitle'] = $this->config['siteName'].' - Login';
        $this->data['tagOgDescription'] = 'Login to GoBatik using email or your social account';
        $this->data['tagKeywords'] = 'Login';
        
		$this->output('basic',$this->data);
    }
    
	public function logout()
    {
		$this->account->del();
		$this->redirect('home');
	}
    
	public function ing()
    {
		if(!isset($_POST['username']) || !isset($_POST['password']))$this->redirect('login');
		
		$data = $this->account->login($_POST['username'],$_POST['password']);
		if(!$data){
			$this->data['error'] = "Login failed, Username and Password doesn't match";
			$this->index();
		}else{
			$this->account->set($data);
            //~ echo '<pre>';print_r($_POST);echo '</pre>';die();
            ($_POST['redirect'] != '')?
			$this->redirect($_POST['redirect']):$this->redirect('home');
		}
	}
}
