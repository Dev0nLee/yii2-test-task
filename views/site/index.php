<?php

use app\models\Topic;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Topics';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJs(
	"window.appRoutes = {\n\tundertopics: '" . Url::to(['site/undertopics']) . "',\n\tcontent: '" . Url::to(['site/content']) . "'\n};",
	\yii\web\View::POS_HEAD
);
?>
<div class="site-index">


    <div class="body-content">


        <div class="row">
            <div class="col-lg-12 mb-3">
                <h2>Темы / Подтемы / Содержание</h2>
            </div>
        </div>

        <table class="three-col-table" style="width:100%">
            <tbody>
                <tr>
                    <td class="col-topics">
                        <h3>Темы</h3>
                        <ul id="topics" class="list-group">
                            <?php foreach ($topics as $topic): ?>
                                <li class="list-group-item topic-item" data-id="<?= $topic->id ?>"><?= Html::encode($topic->title) ?></li>
                            <?php endforeach; ?>
                            <li class="list-group-item topic-item empty-cell"></li>
                        </ul>
                    </td>
                    <td class="col-undertopics" id="undertopics"></td>
                    <td class="col-content" id="content" rowspan="3"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
