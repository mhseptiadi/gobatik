<?php

namespace Models;
use Resources;
use Libraries\Facebook;

class Social extends Base
{
	public function __construct()
    {
        parent::__construct();	
	}
    
    public function facebook($action)
    {
        $facebook = new Facebook(array(
          'appId'  => '809998312365169',
          'secret' => '80078418831e0f2cee743d1fce4cf260',
        ));
        
        
        $user = $facebook->getUser();
        
        if ($user) {
            try {
            // Proceed knowing you have a logged in user who's authenticated.
                $user_profile = $facebook->api('/me');
            } catch (Exception $e) {
                error_log($e);
                $user = null;
            }
        }

        if($action === 'logout'){
            //~ echo '<pre>';print_r('s');echo '</pre>';die();
            $facebook->destroySession();
            header("Location: http://septiadi.com/demo/site/login/logout");
        }

        // Login or logout url will be needed depending on current user state.
        if ($user) {
            $logoutUrl = $facebook->getLogoutUrl(array('next' => 'http://septiadi.com/demo/site/?action=logout'));
            //~ $logoutUrl = str_replace(array('?action=logout',urlencode('demo/site')),array('',urlencode('demo/site/?action=logout')),$logoutUrl);
        } else {
            $loginUrl = $facebook->getLoginUrl(
            array(
                'scope'         => 'email,user_location,user_about_me,user_hometown',
            )
            );
        }

        // This call will always work since we are fetching public data.
        //~ $naitik = $facebook->api('/naitik');

        $return = array(
            'status' => false,
            'logoutUrl' => isset($logoutUrl)?$logoutUrl:'',
            'loginUrl' => isset($loginUrl)?$loginUrl:'',
            'user' => array()
        );
        if ($user):
            $return['status'] = true;
            $return['user']['image'] = "https://graph.facebook.com/{$user}/picture";
            $return['user']['user_profile'] = $user_profile;
        endif;
        
        return $return;

    }
    

    public function twitter()
    {
        include_once("../app/Libraries/twitter/twitteroauth.php");
            if (isset($_REQUEST['oauth_token']) && $this->session->getValue('token')  !== $_REQUEST['oauth_token']) {

                // if token is old, distroy any session and redirect user to index.php
                session_destroy();
                header('Location: ./index.php');
                
            }elseif(isset($_REQUEST['oauth_token']) && $this->session->getValue('token') == $_REQUEST['oauth_token']) {

                // everything looks good, request access token
                //successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
                $connection = new \TwitterOAuth($this->config['CONSUMER_KEY'], $this->config['CONSUMER_SECRET'], $this->session->getValue('token') , $this->session->getValue('token_secret'));
                $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
                                
                if($connection->http_code=='200')
                {
                    //redirect user to twitter
                    //~ $this->session->['status'] = 'verified';
                    //~ $this->session->['request_vars'] = $access_token;
                    
                    $return['access_token'] = $access_token;
                    
                    // unset no longer needed request tokens
                    ($this->session->deleteValue('token'));
                    ($this->session->deleteValue('token_secret'));
                    header('Location: ./index.php');
                }else{
                    die("error, try again later!");
                }
                    
            }else{

                //~ if(isset($_GET["denied"]))
                //~ {
                    //~ header('Location: ./index.php');
                    //~ die();
                //~ }

                //fresh authentication
                $connection = new \TwitterOAuth($this->config['CONSUMER_KEY'], $this->config['CONSUMER_SECRET']);
                $request_token = $connection->getRequestToken($this->config['OAUTH_CALLBACK']);
                
                //received token info from twitter
                $this->session->setValue('token',$request_token['oauth_token']);
                $this->session->setValue('token_secret',$request_token['oauth_token_secret']);
                
                // any value other than 200 is failure, so continue only if http code is 200
                if($connection->http_code=='200')
                {
                    //redirect user to twitter
                    $return['loginUrlTW'] = $connection->getAuthorizeURL($request_token['oauth_token']);
                    //~ header('Location: ' . $twitter_url); 
                }else{
                    $return['loginUrlTW'] = false;
                }
            }
        return $return;
    }
    
    public function gplus()
    {
        require_once APP.'Libraries/gplus/Google_Client.php';
        require_once APP.'Libraries/gplus/contrib/Google_PlusService.php';
        
        $this->libBase = new \Libraries\Base;
        
        if (isset($_GET['state']) && $this->session->getValue('state') != $_GET['state']) {
            $return['false'] = ('HTTP/ 401 Invalid state parameter');
            return $return;
        }
        
        $client = new \Google_Client();
        $client->setApplicationName('Google+ server-side flow');
        $client->setClientId($this->config['GP:client_id']);
        $client->setClientSecret($this->config['GP:client_secret']);
        $client->setRedirectUri($this->config['GP:redir_url']);
        //~ $client->setDeveloperKey('YOUR_SIMPLE_API_KEY');
        $plus = new \Google_PlusService($client);

        if (isset($_GET['code'])) {
            $client->authenticate();
            // Get your access and refresh tokens, which are both contained in the
            // following response, which is in a JSON structure:
            $jsonTokens = $client->getAccessToken();
            
            $this->session->setValue('token',$jsonTokens);

            $jsonTokens = json_decode($jsonTokens);
            $user = $this->libBase->curl('https://www.googleapis.com/plus/v1/people/me?access_token='.$jsonTokens->access_token);
            $return['user'] = json_decode($user);
            return  $return;
        }

    }
}
