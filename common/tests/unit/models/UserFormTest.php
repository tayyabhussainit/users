<?php

namespace common\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\UserForm;

/**
 * Signup form test
 */
class UserFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;


    /**
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ];
    }

    public function testCreateUser()
    {
        $model = new UserForm([
            'username' => 'testt',
            'email' => 'testt@testt.com',
            'password' => 'testt@testt.com',
        ]);

        verify($model->create())->true();
    }

    public function testCreateUserValidationEmail()
    {
        $model = new UserForm([
            'username' => 'testt',
            'email' => '',
            'password' => 'testt@testt.com',
        ]);

        verify($model->create())->null();
    }


    public function testCreateUserValidationPasswordUpdate()
    {
        $model = new UserForm([
            'username' => 'testt',
            'email' => 'testt@testt.com',
            'password' => '',
            'scenario' => 'update'
        ]);

        verify($model->create())->true();
    }
}