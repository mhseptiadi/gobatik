<?php
namespace Controllers;
use Resources, Models;

class Page extends Base
{    
    public function __construct()
    {
        parent::__construct();		
        $this->config = Resources\Config::main();
	}	
	
    public function index()
    {    
		$this->redirect('home');
    }
    
	public function alias($item){
		
		$args =  array(
			'where' =>  array(
				 array(
					'key' => 'seoname',
					'operand' => '=',
					'val' => $item,
					'operand2' => 'AND'
				), array(
					'key' => 'status',
					'operand' => '=',
					'val' => 'publish',
					'operand2' => NULL
				)
			)
		);
		$this->data['page'] = $this->page->get($args);
        
        $this->data['titleTag'] = $this->config['siteName'].' - '.$this->data['page'][0]->title;
        $this->data['tagOgTitle'] = $this->config['siteName'].' - '.$this->data['page'][0]->title;
        $this->data['tagOgDescription'] = strip_tags($this->data['page'][0]->description);
        $this->data['tagKeywords'] = $this->data['page'][0]->title;
        $this->data['tagOgType'] = 'article';
        
		if(empty($this->data['page']) || $this->data['page'][0]->status == 'draft')
		$this->redirect('error');
		
		$args =  array(
			'where' =>  array(
				 array(
					'key' => 'status',
					'operand' => '=',
					'val' => 'publish',
					'operand2' => NULL
				)
			),
			'orderby' => array('key' => 'pageId', 'method' => 'DESC'),
			'limit' => array('page' => 1,'offset' => 10)
		);
		$this->data['rpage'] = $this->page->get($args);
		
		
		$this->output('page',$this->data);
    }
}
