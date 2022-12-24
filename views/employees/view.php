<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Building;
use app\models\Employees;
use kartik\time\TimePicker;

/** @var yii\web\View $this */
/** @var app\models\Employees $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$types =[1=> 'Рабочие',2=> 'Call центр',3=> 'Административная группа',4=> 'Бухгалтерия',];
$statuses = [1 =>'Работает', 2=>'Уволен',3=>'Межвахта',4=> 'На проверке'];
\yii\web\YiiAsset::register($this);
?>
<div class="employees-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить сотрудника?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
               'attribute'=>'type',
                'value' => function(Employees $model) use($types) {
                    return isset($types[$model->type]) ? $types[$model->type] : $model->type;
                },
            ],
            'is_admin:boolean',
            [
                'attribute' => 'naks',
                'format'=>'date',
            ],
            'speciality:ntext',
            [
                'attribute'=>'region',
                'value' => function(Employees $model) use($regions) {
                return $model->regionObj->name;
                },
                
            ],
            'examination:boolean',
            'criminal:boolean',
            [
                'attribute'=>'status',
                'value' => function(Employees $model) use($statuses) {
                    return isset($statuses[$model->status]) ? $statuses[$model->status] : $model->status;
                },
                
            ],
            'email:ntext',
            [
                'attribute'=>'birthday',
                'format'=>'date',
            ],
            'phone',
            'medical:boolean',
            'education:ntext',
            'worktime'
        ],
    ]) ?>

</div>
