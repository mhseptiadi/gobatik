<?php
namespace Modules\Master\Controllers;
use Resources, Modules\Master;

class Comment extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->comment = new Master\Models\Comment;
		$this->data = array();
    }
    
    public function index()
    {
		$args = array(
			'orderby' => array('key' => 'commentId', 'method' => 'DESC'),
			//~ 'limit' => array('page' => 1,'offset' => 10)
		);
		$this->data['comment'] = $this->comment->get($args);
		
		//~ echo '<pre>';print_r($this->data);echo '</pre>';die();
		
		$this->output('comment/list', $this->data);
    }
    
    public function delete()
    {
		echo $this->comment->delete($_POST['id']);
	}
    
    public function change()
    {
		echo $this->comment->update($_POST);
	}
	
    /*
    public function edit()
    {
		
		if(isset($_POST) && !empty($_POST)){
			$patterns = array('/[^A-Za-z0-9 ]/','/(\s+)/');
			$add = $this->comment->update($_POST);
			if($add)
			$this->redirect(MASTERHTTP.'comment/index/uppdatesuccess');
			else
			$this->redirect(MASTERHTTP.'comment/index/uppdatefailure');
		}
		
		$args = func_get_args();
		
		$args = array(
			'where' => array(
				array(
					'key' => 'commentId',
					'operand' => '=',
					'val' => $args[0],
					'operand2' => NULL
				)
			)
		);
		$comment = $this->comment->get($args);
		
		
		$this->data['method'] = 'edit';
		$this->data['comment'] = $comment[0];
		//~ echo '<pre>';print_r($this->data);echo '</pre>';die();
		
		$this->output('comment/add', $this->data);
    }
    
    public function add()
    {
		$this->data['method'] = 'add';
		
		if(isset($_POST) && !empty($_POST)){
			$patterns = array('/[^A-Za-z0-9 ]/','/(\s+)/');
			$add = $this->comment->add($_POST);
			if($add)
			$this->redirect(MASTERHTTP.'comment/index/addsuccess');
			else
			$this->redirect(MASTERHTTP.'comment/index/addfailure');
		}
        
        $this->output('comment/add', $this->data);
    }
    */
}
