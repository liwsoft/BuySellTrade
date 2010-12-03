<?php

class google
{
	public function redirect()
	{
		$_SESSION['openid_url'] = "https://www.google.com/accounts/o8/id";

		$openid = new Dope_OpenID($_SESSION['openid_url']);
		$openid->setReturnURL("@google?verify=true");
		$openid->SetTrustRoot($_SERVER['HTTP_HOST']);
		$openid->setOptionalInfo(array('nickname','firstname','lastname','email'));
		$openid->setRequiredInfo(array('email'));

		$endpoint_url = $openid->getOpenIDEndpoint();
		if($endpoint_url)
		{
			$_SESSION['openid_endpoint_url'] = $endpoint_url;
			$openid->redirect();
			exit;
		}
		else
		{
			$the_error = $openid->getError();
			$error = "Error Code: {$the_error['code']}<br />";
			$error .= "Error Description: {$the_error['description']}<br />";

			return "Prihlásenie týmto spôsobom je dočasne nedostupné!";
		}
  }

  public function verify()
  {
		$openid_url = $_GET['openid_identity'];
		$openid = new Dope_OpenID($openid_url);

		$validate_result = $openid->validateWithServer();

		if ($validate_result === TRUE)
		{
			$userinfo = $openid->filterUserInfo($_GET);
		}
		elseif ($openid->isError() === TRUE)
		{
			$the_error = $openid->getError();
			$error = "Error Code: {$the_error['code']}<br />";
			$error .= "Error Description: {$the_error['description']}<br />";
			
			return "Prihlásenie cez zlyhalo!";
		}
		else
		{
			$error = "Error: Could not validate the OpenID at {$_SESSION['openid_url']}";

      return "Prihlásenie týmto spôsobom zlyhalo! Nemôžeme overiť Vašu identitu!";
		}
  }	
}