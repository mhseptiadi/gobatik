<?php
namespace Modules\Master\Controllers;
use Resources, Modules\Master;

class Slide extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->slide = new Master\Models\Slide;
		$this->data = array();
    }
    
    public function index()
    {
		$args = array(
			'orderby' => array('key' => 'slideId', 'method' => 'DESC'),
			//~'limit' => array('page' => 1,'offset' => 10)
		);
		$this->data['slide'] = $this->slide->get($args);
		
		//~ echo '<pre>';print_r($this->data);echo '</pre>';die();
		
		$this->output('slide/list', $this->data);
    }
    
    public function delete()
    {
		echo $this->slide->delete($_POST['id']);
	}
	
    public function edit()
    {
		
		if(isset($_POST) && !empty($_POST)){
			$patterns = array('/[^A-Za-z0-9 ]/','/(\s+)/');
			$add = $this->slide->update($_POST);
			if($add)
			$this->redirect(MASTERHTTP.'slide/index/uppdatesuccess');
			else
			$this->redirect(MASTERHTTP.'slide/index/uppdatefailure');
		}
		
		$args = func_get_args();
		
		$args = array(
			'where' => array(
				array(
					'key' => 'slideId',
					'operand' => '=',
					'val' => $args[0],
					'operand2' => NULL
				)
			)
		);
		$slide = $this->slide->get($args);
		
		
		$this->data['method'] = 'edit';
		$this->data['slide'] = $slide[0];
		//~ echo '<pre>';print_r($this->data);echo '</pre>';die();
		
		$this->output('slide/add', $this->data);
    }
    
    public function add()
    {
		$this->data['method'] = 'add';
		
		if(isset($_POST) && !empty($_POST)){
			$patterns = array('/[^A-Za-z0-9 ]/','/(\s+)/');
			$add = $this->slide->add($_POST);
			if($add)
			$this->redirect(MASTERHTTP.'slide/index/addsuccess');
			else
			$this->redirect(MASTERHTTP.'slide/index/addfailure');
		}
        
        $this->output('slide/add', $this->data);
    }
}
