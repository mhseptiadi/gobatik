<?php

namespace Models;
use Resources;

class Account extends Base
{
	public function __construct()
    {
        parent::__construct();	
	}
	
	public function login($username,$password){
		return $this->db->select('accountId','username','type','typename')->from($this->config['prefix'].'account')->where('type', '=', 'email', 'AND')->where('username', '=', $username, 'AND')->where('password', '=', md5($password))->getOne(); 
	}
	
	public function register($data){
		if($this->db->select()->from($this->config['prefix'].'account')->where('username', '=', $data['username'], 'AND')->where('type', '=', $data['type'])->getOne()){
			return array('status' => 'error', 'message' => 'Account already exist');
		} 
		if($this->db->select()->from($this->config['prefix'].'account')->where('typename', '=', $data['typename'], 'AND')->where('type', '=', $data['type'])->getOne()){
			return array('status' => 'error', 'message' => 'Account already exist');
		}
		if($this->db->insert($this->config['prefix'].'account',$data)){
			return array('status' => 'success', 'message' => 'Account has been added');
		}
	}
    
    public function getDbSocial($type,$typename){
        return $this->db->select()->from($this->config['prefix'].'account')->where('type', '=', $type, 'AND')->where('typename', '=', $typename)->getOne();
    }
    
    public function setDbSocial($data){
        if($this->db->insert($this->config['prefix'].'account',$data)){
			return array('status' => 'success', 'message' => 'Account has been added');
		}
    }
	
	public function set($data)
	{
		return $this->session->setValue('account',$data);
	}
	
	public function get()
	{
		return $this->session->getValue('account');
	}
	
	public function del()
	{
		return $this->session->deleteValue('account');
	}

}
