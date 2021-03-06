<?php

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $username
 * @property string $email
 * @property string $salt
 * @property string $password
 * @property string $name
 * @property boolean $is_active
 * @property boolean $is_super_admin
 * @property timestamp $last_login
 * 
 * @method string    getUsername()       Returns the current record's "username" value
 * @method string    getEmail()          Returns the current record's "email" value
 * @method string    getSalt()           Returns the current record's "salt" value
 * @method string    getPassword()       Returns the current record's "password" value
 * @method string    getName()           Returns the current record's "name" value
 * @method boolean   getIsActive()       Returns the current record's "is_active" value
 * @method boolean   getIsSuperAdmin()   Returns the current record's "is_super_admin" value
 * @method timestamp getLastLogin()      Returns the current record's "last_login" value
 * @method User      setUsername()       Sets the current record's "username" value
 * @method User      setEmail()          Sets the current record's "email" value
 * @method User      setSalt()           Sets the current record's "salt" value
 * @method User      setPassword()       Sets the current record's "password" value
 * @method User      setName()           Sets the current record's "name" value
 * @method User      setIsActive()       Sets the current record's "is_active" value
 * @method User      setIsSuperAdmin()   Sets the current record's "is_super_admin" value
 * @method User      setLastLogin()      Sets the current record's "last_login" value
 * 
 * @package    buySellTrade
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user');
        $this->hasColumn('username', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 128,
             ));
        $this->hasColumn('email', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 128,
             ));
        $this->hasColumn('salt', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_super_admin', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('last_login', 'timestamp', null, array(
             'type' => 'timestamp',
             ));


        $this->index('name_idx', array(
             'fields' => 
             array(
              0 => 'username',
             ),
             'unique' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}