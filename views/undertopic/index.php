<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */


if (Yii::$app->request->isAjax) {
    $this->title = '';
} else {
    $this->title = 'Undertopics';
    $this->params['breadcrumbs'][] = $this->title;
}
?>

<div class="undertopic-index">
    <h3>Подтемы</h3>
    
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function ($model) {
            return '<tr><td class="subtopic-item" data-id="' . $model->id . '">' . Html::encode($model->title) . '</td></tr>';
        },
        'layout' => '<table id="subtopics-table" class="subtopics-table"><tbody>{items}</tbody></table>{pager}',
        'emptyText' => 'Подтемы не найдены',
    ]) ?>
</div>