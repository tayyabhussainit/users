<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\UserForm $model */

use mdm\admin\components\UserStatus;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Create User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->textInput(['value' => '']) ?>

            <?= $form->field($model, 'status')->dropDownList(
                [UserStatus::ACTIVE => 'Active', UserStatus::INACTIVE => 'Inactive'], // An array of options (key-value pairs)
            ) ?>

            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>