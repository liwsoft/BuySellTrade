<?php

class SigninForm extends BaseSigninForm
{
	public function configure()
	{
		parent::configure();

		unset($this['remember']);
		
		$this->getWidgetSchema()->setLabels(array(
			'username' => 'E-mail',
			'password' => 'Heslo'
		));
	}
}
