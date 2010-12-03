<?php

class RegisterUserForm extends BaseRegisterUserForm
{
	public function configure()
	{
		parent::configure();
		
		unset($this['username'], $this['salt']);
		
		$this->setWidget('name',  new sfWidgetFormInputText());
		$this->getWidgetSchema()->moveField('repeat_password', sfWidgetFormSchema::AFTER, 'password');

		$this->getWidgetSchema()->setLabels(array(
			'email' => 'E-mail:',
			'password' => 'Heslo:',
			'repeat_password' => 'Heslo ešte raz:',
			'name' => 'Vaše reálne meno:'
		));

		$this->setValidator('name', new sfValidatorString(array('required'=> true)));
		$this->setValidator('password', new sfValidatorString(array('required'=> true, 'min_length' => 5)));
	}
}