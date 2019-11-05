<?php

namespace Models;
use Resources;

class Subscribe extends Base
{
	public function __construct()
    {
        parent::__construct();	
	}
    
    //~ public function getDbSocial($type,$typename){
        //~ return $this->db->select()->from($this->config['prefix'].'account')->where('type', '=', $type, 'AND')->where('typename', '=', $typename)->getOne();
    //~ }
    
    public function add($data){
        $oldsub = $this->db->select()->from($this->config['prefix'].'subscribe')->where('email', '=', $data['email'])->getOne();
        if(empty($oldsub)){
            if($this->db->insert($this->config['prefix'].'subscribe',$data)){
                return array('status' => 'success', 'message' => 'Account has been added');
            }
        }else{
            return array('status' => 'failed', 'message' => 'Account has already been added');
        }
    }
	
}
