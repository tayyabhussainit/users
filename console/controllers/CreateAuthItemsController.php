<?php

namespace console\controllers;

use common\models\User;
use common\models\AuthItem;
use Yii;
use yii\console\Controller;

class CreateAuthItemsController extends Controller
{
    public function actionIndex()
    {
        $connection = Yii::$app->getDb();
        foreach (AuthItem::AUTH_ITEMS as $name => $type) {
            $childAuthItem = new AuthItem;
            $childAuthItem->name = $name;
            $childAuthItem->type = $type;
            $childAuthItem->save();
        }

        foreach (AuthItem::CHILD_AUTH_ITEMS as $child => $parent) {
            $command = $connection->createCommand("Insert into auth_item_child (parent, child) values ( '" . $parent . "','" . $child . "')");
            $command->queryAll();
        }

        $user = User::findOne(['username' => AuthItem::ADMIN]);
        $command = $connection->createCommand("Insert into auth_assignment (item_name, user_id) values ( '" . AuthItem::ADMIN . "','" . $user->id . "')");
        $command->queryAll();
    }
}
