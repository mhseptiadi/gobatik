<?php
namespace Controllers;
use Resources, Models;

class Base extends Resources\Controller
{    
	public function __construct()
    {
        parent::__construct();
        $this->config = Resources\Config::main();
        
		$this->data = array();
		
        $this->session = new Resources\Session;
        $this->item = new \Modules\Master\Models\Item;
        $this->tag = new \Modules\Master\Models\Tag;
        $this->page = new \Modules\Master\Models\Page;
        
        $this->data['menuHold'] = $this->page->getMenuHold();
        
        $this->account = new \Models\Account;
        $this->slide = new \Models\Slide;
        $this->data['account'] = $this->account->get();
        
		$this->cart = new \Models\Cart;
        $this->data['cart'] = $this->cart->get();
        
        //get uri
        $reflector = new \ReflectionObject($this->uri);
        $nodes = $reflector->getProperty('pathUri');
        $nodes->setAccessible(true);
        $pathUri = $nodes->getValue($this->uri);
        $this->controller = isset($pathUri[0])?$pathUri[0]:'';
        $this->method = isset($pathUri[1])?$pathUri[1]:'';
        $this->redirect = strtolower(implode("/",$pathUri));
        
        if($this->controller != '' && $this->method != ''){
            $this->comment = new \Models\Comment;
            $this->commentList = $this->comment->get(array('controller' => $this->controller,'method' => $this->method,));
        }else{
            $this->commentList = array();
        }
        
        $this->sosial = new \Models\Social;
        $this->loginFB();
        $this->loginTW();
        $this->loginGP();
        
        $this->getTagList(); 
    }
    
    public function loginGP()
    {
        if(empty($this->data['account'])){
            
            $state = $this->session->getValue('state');
            if(empty($state))$this->session->setValue('state',rand(0,9999999999));
            
            $this->socialGP = $this->sosial->gplus();
            
            if(isset($this->socialGP['user']->id)){
                $data = $this->account->getDbSocial('gplus',$this->socialGP['user']->id);
                if(empty($data)){//belum register
                    $insert = array(
                        'username' => $this->socialGP['user']->displayName,
                        'type' => 'gplus',
                        'typename' => $this->socialGP['user']->id,
                        'data' => json_encode($this->socialGP['user'])
                    );
                    $this->account->setDbSocial($insert);
                    
                    $data = $this->account->getDbSocial('gplus',$this->socialGP['user']->id);
                }
                $this->account->set($data);
                if(isset($_GET['code']))
                $this->redirect($this->location(''));
            }else{            
                $this->socialGP['loginUrlGP'] = 'https://accounts.google.com/o/oauth2/auth?scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fplus.login&state='.$this->session->getValue('state').'&redirect_uri='.$this->config['GP:redir_url'].'&response_type=code&client_id='.$this->config['GP:client_id'].'&access_type=offline';
            }
        }
    }
    
    public function loginTW()
    {
        //~ if(empty($this->data['account'])){
            //~ $this->socialTW = $this->sosial->twitter();
            //~ if(isset($this->socialTW['access_token']['user_id'])){
                //~ $data = $this->account->getDbSocial('twitter',$this->socialTW['access_token']['user_id']);
                //~ if(empty($data)){//belum register
                    //~ $insert = array(
                        //~ 'username' => $this->socialTW['access_token']['screen_name'],
                        //~ 'type' => 'twitter',
                        //~ 'typename' => $this->socialTW['access_token']['user_id'],
                        //~ 'data' => json_encode($this->socialTW['access_token'])
                    //~ );
                    //~ $this->account->setDbSocial($insert);
                    //~ 
                    //~ $data = $this->account->getDbSocial('twitter',$this->socialTW['access_token']['user_id']);
                //~ }
                //~ $this->account->set($data);
            //~ }
        //~ }
    }
    
    public function loginFB()
    {
        
        if(isset($_GET['action']) && $_GET['action'] === 'logout')
            $action = 'logout';
        else
            $action = 'login';
            
        $socialFb = $this->sosial->facebook($action);
        if($socialFb['status'] == true){
            $data = $this->account->getDbSocial('facebook',$socialFb['user']['user_profile']['id']);
            if(empty($data)){//belum register
                $insert = array(
                    'username' => $socialFb['user']['user_profile']['name'],
                    'type' => 'facebook',
                    'typename' => $socialFb['user']['user_profile']['id'],
                    'data' => json_encode($socialFb['user']['user_profile'])
                );
                $this->account->setDbSocial($insert);
                
                $data = $this->account->getDbSocial('facebook',$socialFb['user']['user_profile']['id']);
            }
            $this->account->set($data);
            $this->logoutUrl = $socialFb['logoutUrl'];
            if(isset($_GET['code']))
            $this->redirect($this->location(''));
        }else{
            $this->loginUrlFB = $socialFb['loginUrl'];
        }
        
    }
    
    public function getTagList()
    {
		$args = array(
			'orderby' => array('key' => 'name', 'method' => 'ASC'),
			//~'limit' => array('page' => 1,'offset' => 10)
		);
		$this->data['taglist'] = $this->tag->get($args);
	}
	
	public function getBox1()
	{
		$args = array(
			'orderby' => array('key' => 'itemId', 'method' => 'DESC'),
			'limit' => array('page' => 1,'offset' => 8)
		);
		$this->data['box1'] = $this->item->get($args);
		$this->data['box1'] = $this->output('box/box1',$this->data,true);
	}
	
	public function getBox2()
	{
		$args = array(
			'orderby' => array('key' => 'itemId', 'method' => 'DESC')
		);
		$this->data['box2'] = $this->item->get($args);
		$this->data['box2'] = $this->output('box/box2',$this->data,true);
	}
	
	public function getHl3()
	{
		$args = array(
			'orderby' => array('key' => 'itemId', 'method' => 'DESC'),
			'limit' => array('page' => 1,'offset' => 3)
		);
		$this->data['hl3'] = $this->item->get($args);
		$this->data['hl3'] = $this->output('box/hl3',$this->data,true);
	}
    
	public function slider()
	{
		$this->data['slider'] = $this->slide->get();
		$this->data['slider'] = $this->output('box/slider',$this->data,true);
	}
}
