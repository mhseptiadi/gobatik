<?php

namespace Modules\Master\Models;
use Resources;

class Page extends Base
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
					'key' => 'pageId',
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
			'orderby' => array('key' => 'pageId', 'method' => 'DESC'),
			'limit' => array('page' => 1,'offset' => 10)
		];
		 * */
		
		$query = '$data = $this->db->select()->from($this->config[\'prefix\'].\'page\')';
		
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
		return $this->db->insert($this->config['prefix'].'page', $post);
	}
	
	public function update($post){
		$arrid = array('pageId' => $post['pageId']);
		unset($post['pageId']);
		return $this->db->update($this->config['prefix'].'page', $post, $arrid);
	}

	public function delete($id){
		return $this->db->delete($this->config['prefix'].'page', array('pageId' => $id));
	}
    
    public function getMenuHold(){
        return $this->db->select('title','seoname')->from($this->config['prefix'].'page')->where('status', '=', 'publish', 'AND')->where('menu', '!=', 0)->orderBy('menu', 'DESC')->getAll(); 
    }

}
