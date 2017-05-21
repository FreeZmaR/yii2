<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserMemo */

$this->title = 'Update User Memo: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'User Memos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-memo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
