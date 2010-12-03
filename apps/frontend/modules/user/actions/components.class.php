<?php

class userComponents extends sfComponents
{
	public function executeMenu(sfWebRequest $menu)
	{
		if($this->getUser()->isAuthenticated() == false)
		{
			$this->form = new SigninForm();
		}
	}
}