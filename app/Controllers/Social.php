<?php
namespace Controllers;
use Resources, Models;

//~ require_once('../app/Libraries/Facebook/autoload.php' );
//~ 
//~ use Facebook\FacebookRedirectLoginHelper;
//~ use Facebook\FacebookSession;
//~ use Facebook\FacebookRequest;   
//~ use Facebook\GraphUser;
//~ use Facebook\FacebookRequestException;


//~ require_once('../app/Libraries/Facebook/autoload.php' );
use Libraries\Facebook;



class Social extends Base
{    
    public function __construct()
    {
        parent::__construct();
        $this->session = new Resources\Session; 
	}	
	
    public function index()
    {    						
    }
    
    public function facebook()
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

        if(isset($_GET['action']) && $_GET['action'] === 'logout'){
            $facebook->destroySession();
            header("Location: ".$_SERVER['PHP_SELF']."");
        }

        // Login or logout url will be needed depending on current user state.
        if ($user) {
            $logoutUrl = $facebook->getLogoutUrl();
            $logoutUrl = str_replace(array('?action=logout',urlencode('social/facebook')),array('',urlencode('social/facebook/?action=logout')),$logoutUrl);
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
            'logoutUrl' => isset($logoutUrl)?$logoutUrl:'',
            'loginUrl' => isset($loginUrl)?$loginUrl:'',
            'user' => array()
        );
        if ($user):
            $return['user']['image'] = "https://graph.facebook.com/{$user}/picture";
            $return['user']['user_profile'] = $user_profile;
        endif;

        echo '<pre>';print_r($return);echo '</pre>';
        
        ?>
        <?php if ($user): ?>
        <a href="<?php echo $logoutUrl; ?>">Logout</a>
        <?php else: ?>
        <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
        </div>
        <?php endif ?>

        <?php
    }
	
    //~ public function facebook() // v.4
    //~ {    		        
        //~ FacebookSession::setDefaultApplication('809998312365169', '80078418831e0f2cee743d1fce4cf260');
        //~ $helper = new FacebookRedirectLoginHelper('http://demo.septiadi.com/social/facebook');
        //~ try {
          //~ $session = $helper->getSessionFromRedirect();
        //~ } catch(FacebookRequestException $ex) {
          //~ // When Facebook returns an error
        //~ } catch(\Exception $ex) {
          //~ // When validation fails or other local issues
        //~ }
        //~ if ($session) {
//~ 
            //~ try {
                //~ 
                //~ $fbrequest = new FacebookRequest(
                //~ $session, 'GET', '/me'
                //~ );
                //~ $user_profile = $fbrequest->execute()->getGraphObject(GraphUser::className());
//~ 
                //~ echo "Name: " . $user_profile->getName();
//~ 
            //~ } catch(FacebookRequestException $e) {
//~ 
                //~ echo "Exception occured, code: " . $e->getCode();
                //~ echo " with message: " . $e->getMessage();
//~ 
            //~ }   
//~ 
        //~ }else{
            //~ echo $loginUrl = $helper->getLoginUrl();
        //~ }
            //~ 
    //~ }
}
