<?php
namespace Modules\Master\Controllers;
use Resources, Modules\Master;

class Item extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->item = new Master\Models\Item;
        $this->tag = new Master\Models\Tag;
        
		$this->data = array();
		
		$args = [
			'orderby' => array('key' => 'tagId', 'method' => 'DESC'),
			//~'limit' => array('page' => 1,'offset' => 10)
		];
		$this->data['tag'] = $this->tag->get($args);
		unset($_POST['data-table_length']);
    }
    
    public function index()
    {
		$args = [
			'orderby' => array('key' => 'itemId', 'method' => 'DESC'),
			//~'limit' => array('page' => 1,'offset' => 10)
		];
		$this->data['items'] = $this->item->get($args);
		
		$this->output('item/list', $this->data);
    }
        
    public function delete()
    {
		echo $this->item->delete($_POST['id']);
	}
	
    public function edit()
    {
		
		if(isset($_POST) && !empty($_POST)){
			$patterns = array('/[^A-Za-z0-9 ]/','/(\s+)/');
			$_POST['seoname'] = strtolower(preg_replace($patterns, '-', $_POST['name']));
			$_POST['images'] = json_encode(array_filter($_POST['images']));//images array
			$_POST['tag'] = json_encode(array_filter($_POST['tag']));//tag array
			$add = $this->item->update($_POST);
			if($add)
			$this->redirect(MASTERHTTP.'item/index/uppdatesuccess');
			else
			$this->redirect(MASTERHTTP.'item/index/uppdatefailure');
		}
		
		$args = func_get_args();
		
		$args = array(
			'where' => array(
				array(
					'key' => 'itemId',
					'operand' => '=',
					'val' => $args[0],
					'operand2' => NULL
				)
			)
		);
		$item = $this->item->get($args);
		
		
		$this->data['method'] = 'edit';
		$this->data['item'] = $item[0];
		//~ echo '<pre>';print_r($this->data);echo '</pre>';die();
		
		$this->output('item/add', $this->data);
    }
    
    public function add()
    {
		$this->data['method'] = 'add';
		
		if(isset($_POST) && !empty($_POST)){
			$patterns = array('/[^A-Za-z0-9 ]/','/(\s+)/');
			$_POST['seoname'] = strtolower(preg_replace($patterns, '-', $_POST['name']));
			$_POST['images'] = json_encode($_POST['images']);//images array
			$_POST['tag'] = json_encode($_POST['tag']);//images array
			$add = $this->item->add($_POST);
			if($add)
			$this->redirect(MASTERHTTP.'item/index/addsuccess');
			else
			$this->redirect(MASTERHTTP.'item/index/addfailure');
		}
        
        $this->output('item/add', $this->data);
    }
}
