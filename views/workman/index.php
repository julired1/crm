<?php

use app\models\Workman;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\WorkmanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Рабочие';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workman-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить рабочего', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'building_id',
            'employees_id',
            'medical:boolean',
            'naks',
            'criminal:boolean',
            'speciality:ntext',
            'limit',
            'examination:boolean',
            'education:ntext',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Workman $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
