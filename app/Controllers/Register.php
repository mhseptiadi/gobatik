<?php
namespace Controllers;
use Resources, Models;

class Register extends Base
{    
    public function __construct()
    {
        parent::__construct();		
        $this->config = Resources\Config::main();
	}	
	
    public function index()
    {
		$this->data['headWord'] = 'Register';    
		$this->data['footWord'] = '<p>Already have an Account? <a href="'.SITE.'login">Login</a></p>';    
		$this->data['form'] = $this->output('box/register',[],true);    
        
        $this->data['titleTag'] = $this->config['siteName'].' - Register';
        $this->data['tagOgTitle'] = $this->config['siteName'].' - Register';
        $this->data['tagOgDescription'] = 'Register to GoBatik using email or your social account';
        $this->data['tagKeywords'] = 'Register';
        
		$this->output('basic',$this->data);
    }
    
    public function ing()
    {
		if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email']))$this->redirect('register');
		if($_POST['password'] != $_POST['repassword']){
			$this->data['error'] = "Password not match";
			$this->index();
			die();
		}
		if(strlen($_POST['password']) < 7){
			$this->data['error'] = "Minimun password length is 7";
			$this->index();
			die();
		}
		
		$data['username'] = $_POST['username'];
		$data['password'] = md5($_POST['password']);
		$data['type'] = 'email';
		$data['typename'] = $_POST['email'];
		$return = $this->account->register($data);
		if($return['status'] == 'error'){
			$this->data['error'] = $return['message'];
			$this->index();
			die();
		}
		if($return['status'] == 'success'){
			$this->success();
			die();
		}
	}
	
    public function success()
    {
		$this->data['headWord'] = 'Register';    
		$this->data['footWord'] = '<p>Already have an Account? <a href="'.SITE.'login">Login</a></p>';    
		$this->data['form'] = '<p>Your registration process is success, please check your email for activation.</p>';    
		$this->output('basic',$this->data);
	}
    
}
