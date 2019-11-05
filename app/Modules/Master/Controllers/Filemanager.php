<?php
namespace Modules\Master\Controllers;
use Resources;

class Filemanager extends Base
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {        
        $this->output('filemanager/main', $_GET);
    }

    public function iframe()
    {        
        $this->output('filemanager/iframe', $_GET);
    }
}
