<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Undertopic $model */

$this->title = 'Create Undertopic';
$this->params['breadcrumbs'][] = ['label' => 'Undertopics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="undertopic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
