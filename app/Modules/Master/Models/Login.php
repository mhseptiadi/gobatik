<?php

namespace Modules\Master\Models;
use Resources;

class Login extends Base
{
	public function __construct()
    {
        parent::__construct();	
	}
	
	public function check($username,$password){
		return $this->db->select()->from($this->config['prefix'].'master')->where('username', '=', $username, 'AND')->where('password', '=', md5($password))->getOne(); 
	}
}
