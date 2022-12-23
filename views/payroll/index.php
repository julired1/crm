<?php

use app\models\Payroll;
use yii\helpers\Html;
use app\models\Building;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PayrollSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Табель зарплат';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-index">

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
                'attribute'=>'employees_id',
                'value'=>'employees.name',
            ],
            [
                'attribute'=>'building_id',
                'value'=>'building.title',
                'filter'=>$Building,
            ],
            'speciality:ntext',
            'worktime',
            'coefficient',
            'vat',
            'daily',
            'hourly',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Payroll $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
