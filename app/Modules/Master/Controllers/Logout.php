<?php
namespace Modules\Master\Controllers;
use Resources, Modules\Master;

class Logout extends Base
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
		$this->session->deleteValue('master');
		$this->redirect('master/login');
    }
}
