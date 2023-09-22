<?php

namespace common\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\SignupForm;

/**
 * Signup form test
 */
class SignupFormTest extends \Codeception\Test\Unit
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

    public function testSingupUser()
    {
        $model = new SignupForm([
            'username' => 'testt',
            'email' => 'testt@testt.com',
            'password' => 'testt@testt.com',
        ]);

        verify($model->signup())->true();
    }

    public function testSingupWrongEmail()
    {
        $model = new SignupForm([
            'username' => 'testt',
            'email' => 'test',
            'password' => 'testt@testt.com',
        ]);

        verify($model->signup())->null();
    }

    public function testSingupValidation()
    {
        $model = new SignupForm([
            'username' => '',
            'email' => '',
            'password' => '',
        ]);

        verify($model->signup())->null();
    }
}