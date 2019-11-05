<?php
$this->FacebookSession = new Facebook\FacebookSession;
            $this->FacebookSession->setDefaultApplication('YOUR_APP_ID', 'YOUR_APP_SECRET');
            $helper = new \Facebook\FacebookRedirectLoginHelper('your redirect URL here');
            
