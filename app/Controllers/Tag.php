<?php
namespace Controllers;
use Resources, Models;

class Tag extends Base
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
					'operand2' => NULL
				)
			)
		);
		$this->data['tag'] = $this->tag->get($args);
		
        $this->data['titleTag'] = $this->config['siteName'].' - Tag - '.$this->data['tag'][0]->name;
        $this->data['tagOgTitle'] = $this->config['siteName'].' - Tag - '.$this->data['tag'][0]->name;
        $this->data['tagOgDescription'] = $this->data['tag'][0]->description;
        $this->data['tagKeywords'] = $this->data['tag'][0]->name;
        
		$tagId = $this->data['tag'][0]->tagId;
		
		
		$args =  array(
			'where' =>  array(
				 array(
					'key' => 'tag',
					'operand' => 'LIKE',
					'val' => "%{$tagId}%",
					'operand2' => NULL
				)
			)
		);
		$this->data['item'] = $this->item->get($args);
						
		$args =  array(
			'where' =>  array(
				 array(
					'key' => 'tag',
					'operand' => 'NOT LIKE',
					'val' => "%{$tagId}%",
					'operand2' => NULL
				)
			),
			'orderby' => array('key' => 'itemId', 'method' => 'DESC'),
			'limit' => array('page' => 1,'offset' => 4)
		);
		$this->data['others'] = $this->item->get($args);
		
		//~ echo '<pre>';print_r($this->data);echo '</pre>';
		
		$this->getBox2();
		
		$this->data['sidebarnav'] = true;//used for load js n css for sidebar
		//~ echo '<pre>';print_r($item);echo '</pre>';die();
		$this->output('tag',$this->data);
    }
}
