<?php
namespace Modules\Master\Controllers;
use Resources, Modules\Master;

class Page extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->page = new Master\Models\Page;
		$this->data = array();
    }
    
    public function index()
    {
		$args = array(
			'orderby' => array('key' => 'pageId', 'method' => 'DESC'),
			//~'limit' => array('page' => 1,'offset' => 10)
		);
		$this->data['page'] = $this->page->get($args);
		
		//~ echo '<pre>';print_r($this->data);echo '</pre>';die();
		
		$this->output('page/list', $this->data);
    }
    
    public function delete()
    {
		echo $this->page->delete($_POST['id']);
	}
	
    public function edit()
    {
		
		if(isset($_POST) && !empty($_POST)){
			$patterns = array('/[^A-Za-z0-9 ]/','/(\s+)/');
			$_POST['seoname'] = strtolower(preg_replace($patterns, '-', $_POST['title']));
			$_POST['date'] = date("Y-m-d H:i:s");
			$add = $this->page->update($_POST);
			if($add)
			$this->redirect(MASTERHTTP.'page/index/uppdatesuccess');
			else
			$this->redirect(MASTERHTTP.'page/index/uppdatefailure');
		}
		
		$args = func_get_args();
		
		$args = array(
			'where' => array(
				array(
					'key' => 'pageId',
					'operand' => '=',
					'val' => $args[0],
					'operand2' => NULL
				)
			)
		);
		$page = $this->page->get($args);
		
		
		$this->data['method'] = 'edit';
		$this->data['page'] = $page[0];
		//~ echo '<pre>';print_r($this->data);echo '</pre>';die();
		
		$this->output('page/add', $this->data);
    }
    
    public function add()
    {
		$this->data['method'] = 'add';
		
		if(isset($_POST) && !empty($_POST)){
			$patterns = array('/[^A-Za-z0-9 ]/','/(\s+)/');
			$_POST['seoname'] = strtolower(preg_replace($patterns, '-', $_POST['title']));
			$_POST['date'] = date("Y-m-d H:i:s");
			$add = $this->page->add($_POST);
			if($add)
			$this->redirect(MASTERHTTP.'page/index/addsuccess');
			else
			$this->redirect(MASTERHTTP.'page/index/addfailure');
		}
        
        $this->output('page/add', $this->data);
    }
}
