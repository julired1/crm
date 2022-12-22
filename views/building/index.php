<?php

use app\models\Building;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\MaskedInput;
/** @var yii\web\View $this */
/** @var app\models\BuildingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var @regions array*/

$this->title = 'Строительные объекты';
$this->params['breadcrumbs'][] = $this->title;
$statuses = [1 =>'Активный', 2=>'Завершен',4=> 'На проверке'];
?>
<div class="building-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать объект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title:ntext',
            [
                'attribute' => 'region',
                'value' => function(Building $model) use($regions) {
                    return $model->regionObj->name;
                },
                'filter'=>$regions,
            ],
            'trials:boolean',
            [
                'attribute' => 'status',
                'value' => function(Building $model) use($statuses) {
                    return isset($statuses[$model->status]) ? $statuses[$model->status] : $model->status;
                },
                'filter'=>[1 =>'Активный', 2=>'Завершён',3=>'На проверке'],
            ],
            'phone',
            'limit',
            [
                'class' => ActionColumn::class, 
                'urlCreator' => function ($action, Building $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
