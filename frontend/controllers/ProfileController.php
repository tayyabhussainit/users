<?php

namespace frontend\controllers;

use common\models\User;
use yii\web\Controller;
use frontend\models\UserForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class ProfileController extends Controller
{

    public function actionIndex($id)
    {
        $model = User::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('The requested user does not exist.');
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
