<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Building;

/** @var yii\web\View $this */
/** @var app\models\Payroll $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Табель зарплат', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="payroll-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'employees_id',
            'name:ntext',
            'building.title',
            'speciality:ntext',
            'worktime',
            'coefficient',
            'vat',
            'daily',
            'hourly',
        ],
    ]) ?>

</div>
