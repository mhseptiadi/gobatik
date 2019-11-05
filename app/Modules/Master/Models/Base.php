<?php

namespace Modules\Master\Models;
use Resources;

class Base
{
	public function __construct()
    {
        $this->db = new Resources\Database;
        $this->config = Resources\Config::main();
	}
}
