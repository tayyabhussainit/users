<?php

namespace console\controllers;

use common\models\User;
use mdm\admin\components\UserStatus;
use yii\console\Controller;

class CreateAdminController extends Controller
{
    public function actionIndex()
    {
        $user = new User;
        $user->username = 'admin';
        $user->email = 'admin@system.com';
        $user->status = UserStatus::ACTIVE;
        $user->setPassword('admin123');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();
    }
}
