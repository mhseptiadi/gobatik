<?php

namespace Models;
use Resources;

class Comment extends Base
{
	public function __construct()
    {
        parent::__construct();	
	}
    
    //~ public function getDbSocial($type,$typename){
        //~ return $this->db->select()->from($this->config['prefix'].'account')->where('type', '=', $type, 'AND')->where('typename', '=', $typename)->getOne();
    //~ }
    
    public function add($data){
        if($this->db->insert($this->config['prefix'].'comment',$data)){
            return true;
        }
    }
    public function get($data){
        return $this->db->select('type','username','date','content','commentId')->from($this->config['prefix'].'comment')
        ->join($this->config['prefix'].'account')->on($this->config['prefix'].'account'.'.accountId', '=', $this->config['prefix'].'comment'.'.accountId')
        ->where('status', '=', 1,'AND')->where('controller', '=', $data['controller'],'AND')->where('method', '=', $data['method'])->orderBy('date','DESC')->getAll();
    }
	
}
