<?php

namespace Models;
use Resources;

class Base 
{
	public function __construct()
    {
        $this->session = new Resources\Session;
        $this->db = new Resources\Database;
        $this->config = Resources\Config::main();
	}
}
