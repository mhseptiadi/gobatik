<?php
namespace Controllers;
use Resources, Models;

class Comment extends Base
{    
    public function __construct()
    {
        parent::__construct();		
        $this->comment = new \Models\Comment;
	}	
	
    public function index()
    {    
    }
    
    public function add()
    {    
        $_POST['accountId'] = $this->data['account']->accountId;
        $_POST['date'] = time();
        if($this->comment->add($_POST)){
            $this->redirect($this->location($_POST['controller'].'/'.$_POST['method']));
        }
    }
}
