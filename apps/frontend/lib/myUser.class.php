<?php

class myUser extends doAuthSecurityUser
{
	public function getName()
  {
		$userData = $this->getAccount();
		if($userData->getName() != '')
		{
			return $userData->getName();
		}
		else
		{
			return $userData->getEmail();
		}
  }
}
