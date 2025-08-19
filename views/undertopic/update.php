<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Undertopic $model */

$this->title = 'Update Undertopic: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Undertopics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="undertopic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
