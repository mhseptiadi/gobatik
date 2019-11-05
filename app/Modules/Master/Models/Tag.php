<?php

namespace Modules\Master\Models;
use Resources;

class Tag extends Base
{
	public function __construct()
    {
        parent::__construct();	
	}
	
	public function get($args){
		/* format data
		$args = [
			'where' => [
				[
					'key' => 'tagId',
					'operand' => '=',
					'val' => $args[0],
					'operand2' => 'AND'
				],
				[
					'key' => 'stock',
					'operand' => '>',
					'val' => 4,
					'operand2' => null
				],
			]
			'orderby' => array('key' => 'tagId', 'method' => 'DESC'),
			'limit' => array('page' => 1,'offset' => 10)
		];
		 * */
		
		$query = '$data = $this->db->select()->from($this->config[\'prefix\'].\'tag\')';
		
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
		return $this->db->insert($this->config['prefix'].'tag', $post);
	}
	
	public function update($post){
		$arrid = array('tagId' => $post['tagId']);
		unset($post['tagId']);
		return $this->db->update($this->config['prefix'].'tag', $post, $arrid);
	}

	public function delete($id){
		return $this->db->delete($this->config['prefix'].'tag', array('tagId' => $id));
	}

}
