<?php
namespace Modules\Master\Controllers;
use Resources, Modules\Master;

class Tag extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->tag = new Master\Models\Tag;
		$this->data = array();
    }
    
    public function index()
    {
		$args = [
			'orderby' => array('key' => 'tagId', 'method' => 'DESC'),
			//~'limit' => array('page' => 1,'offset' => 10)
		];
		$this->data['tag'] = $this->tag->get($args);
		
		//~ echo '<pre>';print_r($this->data);echo '</pre>';die();
		
		$this->output('tag/list', $this->data);
    }
    
    public function delete()
    {
		echo $this->tag->delete($_POST['id']);
	}
	
    public function edit()
    {
		
		if(isset($_POST) && !empty($_POST)){
			$patterns = array('/[^A-Za-z0-9 ]/','/(\s+)/');
			$_POST['seoname'] = strtolower(preg_replace($patterns, '-', $_POST['name']));
			$add = $this->tag->update($_POST);
			if($add)
			$this->redirect(MASTERHTTP.'tag/index/uppdatesuccess');
			else
			$this->redirect(MASTERHTTP.'tag/index/uppdatefailure');
		}
		
		$args = func_get_args();
		
		$args = array(
			'where' => array(
				array(
					'key' => 'tagId',
					'operand' => '=',
					'val' => $args[0],
					'operand2' => NULL
				)
			)
		);
		$tag = $this->tag->get($args);
		
		
		$this->data['method'] = 'edit';
		$this->data['tag'] = $tag[0];
		//~ echo '<pre>';print_r($this->data);echo '</pre>';die();
		
		$this->output('tag/add', $this->data);
    }
    
    public function add()
    {
		$this->data['method'] = 'add';
		
		if(isset($_POST) && !empty($_POST)){
			$patterns = array('/[^A-Za-z0-9 ]/','/(\s+)/');
			$_POST['seoname'] = strtolower(preg_replace($patterns, '-', $_POST['name']));
			$add = $this->tag->add($_POST);
			if($add)
			$this->redirect(MASTERHTTP.'tag/index/addsuccess');
			else
			$this->redirect(MASTERHTTP.'tag/index/addfailure');
		}
        
        $this->output('tag/add', $this->data);
    }
}
