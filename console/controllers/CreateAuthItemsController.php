<?php

namespace console\controllers;

use common\models\User;
use common\models\AuthItem;
use common\models\ChildAuthItem;
use Yii;
use yii\console\Controller;

class CreateAuthItemsController extends Controller
{
    public function actionIndex()
    {
        $authItem = new AuthItem;
        $authItem->name = AuthItem::ADMIN;
        $authItem->description = 'Admin Role';
        $authItem->type = '0';
        $authItem->save();
        $connection = Yii::$app->getDb();
        foreach (AuthItem::ADMIN_TASKS as $childItem => $desc) {
            $childAuthItem = new AuthItem;
            $childAuthItem->name = $childItem;
            $childAuthItem->description = $desc;
            $childAuthItem->type = '0';
            $childAuthItem->save();

            $command = $connection->createCommand("Insert into auth_item_child (parent, child) values ( '" . $authItem->name . "','" . $childAuthItem->name . "')");
            $command->queryAll();
        }
        $user = User::findOne(['username' => AuthItem::ADMIN]);
        $command = $connection->createCommand("Insert into auth_assignment (item_name, user_id) values ( '" . $authItem->name . "','" . $user->id . "')");
        $command->queryAll();
    }
}
