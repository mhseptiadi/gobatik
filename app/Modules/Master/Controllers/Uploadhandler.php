<?php
namespace Modules\Master\Controllers;
use Resources, Libraries;

class UploadHandler extends Base
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
	}
    public function php()
    {
//~ error_reporting(E_ALL);
//~ ini_set('display_errors', 'On');
		$upload_handler = new Libraries\UploadHandler;
    }
}
