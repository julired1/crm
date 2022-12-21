<?php

use app\models\Cost;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CostSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var @building array*/

$this->title = 'Табель затрат';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cost-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'building_id',
                'value' => function(Cost $model) use($building) {
                    return $model->buildingObj? $model->buildingObj->name : $model->building;
                },
                'filter'=>$building,
            ],
            'employees_id',
            'product',
            'price',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Cost $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
