<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\HtmlPurifier;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\Undertopic $model */


if (Yii::$app->request->isAjax) {
    $this->title = ''; 
} else {
    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Undertopics', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
?>

<div class="undertopic-view">
    <h3>Содержание</h3>
    <div class="content-box">
            <?= HtmlPurifier::process($model->content) ?>
    </div>
</div>