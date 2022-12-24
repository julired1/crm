<?php

use app\models\Employees;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\EmployeesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var @regions array*/

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
$statuses = [1 =>'Работает', 2=>'Уволен',3=> 'Межва хта',4=> 'На проверке'];
$types =[1=>'Рабочий',2=>'CALL центр',3=>'Админ.Группа',4=>'Бухгалтерия'];
$criminals = [1=>'Есть',2=>'Отсутствует'];
?>
<div class="employees-index">

    <h1><?= Html::encode($this->title) ?></h1>
 
    <p>
        <?= Html::a('Бухгалтерия', ['employees/index', 'EmployeesSearch[type]' =>4],['class' =>'btn btn-success']) ?>
        <?= Html::a('Call центр', ['employees/index', 'EmployeesSearch[type]' =>2],['class' =>'btn btn-success']) ?>
        <?= Html::a('Рабочие', ['workman/index'],['class' =>'btn btn-success']) ?>       
        <?= Html::a('Административная группа', ['employees/index', 'EmployeesSearch[type]' =>3],['class' =>'btn btn-success']) ?>
               <br> 
        <br>  

         <?= Html::a('Добавить сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'name',
            ],
            [
                'attribute' => 'type',
                'value' => function(Employees $model) use($types) {
                return isset($types[$model->type]) ? $types[$model->type] : $model->type;
                },
                'filter' => [1=> 'Рабочие',2=> 'Call центр',3=> 'Административная группа',4=> 'Бухгалтерия',]
            ],
             //'naks:boolean',
            [
                'attribute' => 'naks',
                'format'=>'date',
                'visible' => $searchModel->type == 1,
            ],
            //'is_admin:boolean',
            'speciality:ntext',
            [
                'attribute' => 'region',
                'value' => function(Employees $model) use($regions) {
                    return $model->regionObj? $model->regionObj->name : $model->region;
                },
                'filter'=>$regions,
            ],
            'examination:boolean',
            //'criminal:boolean',
            [
                'attribute' => 'criminal',
                'value'=>function(Employees $model) use ($criminals){
                    return isset($criminals[$model->criminal])?$criminals[$model->criminal]: $model->criminal;
                },
                'visible' => $searchModel->type == 1,
            ],
            [
                'attribute' => 'status',
                'value' => function(Employees $model) use($statuses) {
                    return isset($statuses[$model->status]) ? $statuses[$model->status] : $model->status;
                },
                'filter'=> $statuses
            ],
            'email:email',
            'birthday:date',
            'phone',
            [
                'attribute' => 'medical',
                'format'=>'boolean',
                'visible' => $searchModel->type == 1,
            ],
                         //'education:boolean',
            [
                'attribute' => 'education',
                'visible' => $searchModel->type == 1,
            ],
                          //'worktime:time',
            [
                'attribute' => 'worktime',
                'visible' => $searchModel->type == 1,
                'visible' => $searchModel->type == 2,
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Employees $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
