<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UserAuth;

/* @var $this yii\web\View */
/* @var $model app\models\UserMemo */
/* @var $form yii\widgets\ActiveForm */
$user_id = Yii::$app->getUser()->getId();
?>

<div class="user-memo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'fk_user_id', [])->textInput(['style'=>'display:none','value'=> $user_id]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
