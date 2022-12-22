<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Building;
use app\controllers\BuildingController;
/** @var @regions array*/
/** @var yii\web\View $this */
/** @var app\models\Building $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Строительные объекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$statuses = [1 =>'Активный', 2=>'Завершен',4=> 'На проверке'];
?>
<div class="building-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title:ntext',
            [
                'attribute'=>'region',
                'value' => function(Building $model) use($regions) {
                return $model->regionObj->name;
                },
                
            ],
            'limit',
            'trials:boolean',
            [
                'attribute'=>'status',
                'value' => function(Building $model) use($statuses) {
                    return isset($statuses[$model->status]) ? $statuses[$model->status] : $model->status;
                },
                
            ],
            'phone',
        ],
    ]) ?>

</div>
