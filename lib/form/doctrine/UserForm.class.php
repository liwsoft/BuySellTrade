<?php

/**
 * User form.
 *
 * @package    buySellTrade
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
    parent::configure();

    unset($this['username'], $this['email'], $this['salt'], $this['is_active'], $this['is_super_admin'], $this['last_login'], $this['created_at'], $this['updated_at']);

    $this->setWidget('id', new sfWidgetFormInputHidden());
		$this->setWidget('password',  new sfWidgetFormInputPassword());
		$this->setWidget('repeat_password',  new sfWidgetFormInputPassword());
		$this->getWidgetSchema()->moveField('repeat_password', sfWidgetFormSchema::AFTER, 'password');
		
		$this->getWidgetSchema()->setLabels(array(
			'password' => 'Heslo:',
			'repeat_password' => 'Heslo ešte raz:',
			'name' => 'Vaše reálne meno:'
		));

    $this->validatorSchema['id'] = new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => true));
    $this->validatorSchema['password'] = new sfValidatorString(array('min_length' => 5, 'required' => false));
    $this->validatorSchema['repeat_password'] = new sfValidatorString(array('required' => false));

		$this->validatorSchema->setPostValidator(
      new sfValidatorSchemaCompare('password', '==', 'repeat_password')
		);
  }
}
