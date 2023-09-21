<?php

use mdm\admin\components\UserStatus;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\AuthItem $model
 */
$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        if (Yii::$app->user->can('permission_admin') && Yii::$app->user->id != $model->id) {
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data-confirm' => 'Are you sure to delete this item?',
                'data-method' => 'post',
            ]);
        }
        ?>
    </p>

    <?php
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
            [
                'attribute' => 'status',
                'value' => function () use ($model) {
                    return UserStatus::ACTIVE == $model->status ? 'Active' : 'Inactive';
                }
            ]
        ],
    ]);
    ?>
</div>