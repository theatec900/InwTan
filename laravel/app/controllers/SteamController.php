<?php

class SteamController extends BaseController {
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
 
  public function __construct(Hybrid_Auth $hybridAuth){
        $this->hybridAuth = $hybridAuth;
  }
   
  public function login($action=''){
  	if ( $action == "auth" ){
      		try {
         		Hybrid_Endpoint::process();
      	}
      	catch ( Exception $e ){
        	 echo "Error at Hybrid_Endpoint process (SteamController@login): $e";
      	}
      	return;
   	}
    // Authenticate with Steam (using the details from our IoC Container).
    $hybridAuthProvider = $this->hybridAuth->authenticate( "Steam" );
    // Get user profile information
    $hybridAuthUserProfile = $hybridAuthProvider->getUserProfile();
    // Get Community ID
    $steamCommunityId = str_replace( "http://steamcommunity.com/openid/id/", "", $hybridAuthUserProfile->identifier );
    //echo "Hello {$hybridAuthUserProfile->displayName}, your Steam Community ID is $steamCommunityId";
    var_dump($hybridAuthUserProfile);
  }

	public function logout(){
		$this->hybridAuth->logoutAllProviders();
	}
}
