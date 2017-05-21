<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserMemo */

$this->title = 'Create User Memo';
$this->params['breadcrumbs'][] = ['label' => 'User Memos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-memo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
