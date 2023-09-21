<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\UserForm;
use yii\web\Controller;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class UserController extends Controller
{

    public function actionIndex()
    {
        $currentUser = Yii::$app->user->identity;
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['<>', 'username', $currentUser->username]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new UserForm();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post()) && $model->create()) {
            Yii::$app->session->setFlash('success', 'User Created');
            return $this->goHome();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('permission_admin') || Yii::$app->user->id == $id) {
            $user = User::findOne($id);

            if (!$user) {
                throw new NotFoundHttpException('The requested user does not exist.');
            }

            $model = new UserForm();
            $model->setScenario('update');
            $model->username = $user->username;
            $model->email = $user->email;
            $model->status = $user->status;

            if ($model->load(Yii::$app->request->post()) && $model->update($id)) {
                Yii::$app->session->setFlash('success', 'User Updated');

                return $this->redirect(['view', 'id' => $user->id]);
            }

            return $this->render('update', ['model' => $model]);
        } else {
            throw new ForbiddenHttpException('Forbidden');
        }
    }

    public function actionView($id)
    {
        if (Yii::$app->user->can('permission_admin') || Yii::$app->user->id == $id) {
            $model = User::findOne($id);

            if (!$model) {
                throw new NotFoundHttpException('The requested user does not exist.');
            }

            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {

        $model = User::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('The requested user does not exist.');
        }

        if ($id == Yii::$app->user->id) {
            throw new ForbiddenHttpException('Forbidden');
        } else {
            $model->delete();
            Yii::$app->session->setFlash('success', 'User Deleted');
            return $this->redirect(['index']);
        }
    }
}
