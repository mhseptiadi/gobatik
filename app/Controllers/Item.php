<?php
namespace Controllers;
use Resources, Models;

class Item extends Base
{    
    public function __construct()
    {
        parent::__construct();	
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
					'operand2' => NULL
				)
			)
		);
		$this->data['item'] = $this->item->get($args);
        
        $this->data['titleTag'] = $this->config['siteName'].' - '.$this->data['item'][0]->name;
        $this->data['tagOgTitle'] = $this->config['siteName'].' - '.$this->data['item'][0]->name;
        $this->data['tagOgImage'] = $this->data['item'][0]->cover;
        $this->data['tagOgDescription'] = strip_tags($this->data['item'][0]->description);
        $this->data['tagKeywords'] = $this->data['item'][0]->name;
		
		$args =  array(
			'where' =>  array(
				 array(
					'key' => 'seoname',
					'operand' => '!=',
					'val' => $item,
					'operand2' => NULL
				)
			),
			'orderby' => array('key' => 'itemId', 'method' => 'DESC'),
			'limit' => array('page' => 1,'offset' => 4)
		);
		$this->data['others'] = $this->item->get($args);
		
		
		$this->getBox2();
		
		$this->data['sidebarnav'] = true;//used for load js n css for sidebar
		
		$this->output('item',$this->data);
    }
}
