<?php
namespace Modules\Master\Controllers;
use Resources;

class Base extends Resources\Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session = new Resources\Session; 
        $this->curUri = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $this->master = $this->session->getValue('master');
        $this->path = $this->getPathArgs($this->curUri);
        
		$loginUri = strpos($this->curUri, "master/login");
        
        if($this->master == '' && $loginUri === false)$this->redirect('master/login');
    }    
    
    public function getPathArgs($url){
		return array_filter(explode('/',$url));
	}
	
	public function sidebarActive($mode,$val = null, $val2 = null){
		switch ($mode) {
			case "home":
				echo !isset($this->path[6])?'class="open"':'';
				break;
			case "sub":
				echo isset($this->path[6]) && $this->path[6] == $val?'class="has_sub open"':'class="has_sub"';
				break;
			case "subsub":
				echo isset($this->path[6])  && $this->path[6] == $val && isset($this->path[7]) && $this->path[7] == $val2?'class="current"':'';
				echo isset($this->path[6])  && $this->path[6] == $val && !isset($this->path[7]) && $val2 == null?'class="current"':'';
				break;
			default:
				echo "";
		}
	}
}
