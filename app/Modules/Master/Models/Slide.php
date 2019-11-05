<?php

namespace Modules\Master\Models;
use Resources;

class Slide extends Base
{
	public function __construct()
    {
        parent::__construct();	
	}
	
	public function get($args){
		
		$query = '$data = $this->db->select()->from($this->config[\'prefix\'].\'slide\')';
		
		if(isset($args['where'])){
		
			foreach ($args['where'] as $key => $val)
			{
				$operand2 = ($val['operand2'] != null)?',\''.$val['operand2'].'\'':'';
				$query .= '->where($args[\'where\']['.$key.'][\'key\'], $args[\'where\']['.$key.'][\'operand\'], $args[\'where\']['.$key.'][\'val\']'.$operand2.')';
			}
			
		}
		
		if(isset($args['orderby']))
		$query .= '->orderBy($args[\'orderby\'][\'key\'], $args[\'orderby\'][\'method\'])';
		
		if(isset($args['limit']))
		$query .= '->limit($args[\'limit\'][\'offset\'],($args[\'limit\'][\'page\']-1)*$args[\'limit\'][\'offset\'])';
		
		$query .= '->getAll();';
		
		eval($query);
		
		return $data;
	}
	
	public function add($post){
		return $this->db->insert($this->config['prefix'].'slide', $post);
	}
	
	public function update($post){
		$arrid = array('slideId' => $post['slideId']);
		unset($post['slideId']);
		return $this->db->update($this->config['prefix'].'slide', $post, $arrid);
	}

	public function delete($id){
		return $this->db->delete($this->config['prefix'].'slide', array('slideId' => $id));
	}

}
