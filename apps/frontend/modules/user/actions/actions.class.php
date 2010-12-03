<?php

class userActions extends doAuthActions
{
  public function executeFacebook(sfWebRequest $request)
  {
    $this->facebook = new Facebook(array(
      'appId'  => sfConfig::get('app_facebook_app_id'),
      'secret' => sfConfig::get('app_facebook_app_secret'),
      'cookie' => true
    ));

    $session = $this->facebook->getSession();

    $me = null;
    if ($session)
    {
      try
      {
	 			$me = $this->facebook->api('/me');
      }
      catch (FacebookApiException $e)
      {
        error_log($e);
      }
    }	

		if($me != null)
		{
			$user = Doctrine::getTable('User')->findOneByUsername($me['email']);
			if($user)
			{
				$this->getUser()->signIn($user);
			}
			else
			{
				$user = new User();
				$user->setEmail($me['email']);
				$user->setName($me['name']);
				$user->setIsActive(true);
        $user->save();

				$this->getUser()->signIn($user);
			}
      return $this->redirect('@homepage');
		}
  }

	public function executeGoogle(sfWebRequest $request)
	{
		if($request->hasParameter('verify') && $request->getGetParameter('openid_mode') != "cancel")
		{
			$user = $this->getUser();
      $googleOpenID = new GoogleOpenID( 'http://'.$_SERVER['SERVER_NAME'] );
      
      if ( $googleOpenID->verifyLogin() )
			{
				$user = Doctrine::getTable('User')->findOneByUsername($googleOpenID->getEmail());
				if($user)
				{
					$this->getUser()->signIn($user);
				}
				else
				{
					$user = new User();
					$user->setEmail($googleOpenID->getEmail());
					$user->setName($googleOpenID->getFirstname() .' '. $googleOpenID->getLastname());
					$user->setIsActive(true);
	        $user->save();

					$this->getUser()->signIn($user);
				}
	      return $this->redirect('@homepage');
      }
		}
		elseif($request->getGetParameter('openid_mode') == "cancel")
		{
			$this->error = "Prihlásenie bolo zrušené užívateľom!";
		}
		else
		{
			$googleOpenID = new GoogleOpenID( sfContext::getInstance()->getRequest()->getUriPrefix() );
    	$returnTo = $this->generateUrl('google', array('verify' => true), true);
    	return $this->redirect($googleOpenID->getLoginUrl( $returnTo ));
		}
	}

	public function executeSettings(sfWebRequest $request)
  {       
    $this->form = new UserForm($this->getUser()->getAccount());

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('user'));     
      if ($this->form->isValid()) {
        $user = $this->getUser()->getAccount();
				$user->setName($this->form->getValue('name'));
        if($this->form->getValue('password') != '')
	      {
	        $user->setPassword($this->form->getValue('password'));
	      }
        $user->save();

        $this->getUser()->setFlash('notice','Zmeny boli uložené');

        $this->redirect(sfConfig::get('app_doAuth_register_redirect','@settings'));
      }
    }
  }
}
