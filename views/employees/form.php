<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Employees $model */
/** @var yii\widgets\ActiveForm $form */
/** @var @Regions array*/

$this->title = $model -> isNewRecord ?  'Создать объект ': 'Изменить объект';
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-create">

    <h1><?= Html::encode($this->title) ?></h1>



    <div class="employees-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'type')->dropDownList ([1=> 'Рабочие',2=> 'Call центр',3=> 'Административная группа',4=> 'Бухгалтерия',]) ?>

        <?= $form->field($model, 'naks')->textInput() ?>

        <?= $form->field($model, 'speciality')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'region')->dropDownList ('region') ?>

        <?= $form->field($model, 'examination')->checkbox() ?>

        <?= $form->field($model, 'criminal')->checkbox() ?>

        <?= $form->field($model, 'status')->dropDownList([1 =>'Активный', 2=>'Завершен',3=> 'На проверке']) ?>

        <?= $form->field($model, 'email')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'birthday')->textInput() ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'medical')->checkbox() ?>

        <?= $form->field($model, 'education')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'worktime')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
