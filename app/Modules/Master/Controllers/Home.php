<?php
namespace Modules\Master\Controllers;
use Resources;

class Home extends Base
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
		$data = array();
        
        $this->output('home', $data);
    }
}
