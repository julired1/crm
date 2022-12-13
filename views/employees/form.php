<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Employees $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $model -> isNewRecord ?  'Создать объект ': 'Изменить объект';
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-create">

    <h1><?= Html::encode($this->title) ?></h1>



    <div class="employees-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'type')->textInput() ?>

        <?= $form->field($model, 'naks')->textInput() ?>

        <?= $form->field($model, 'speciality')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'region')->textInput() ?>

        <?= $form->field($model, 'examination')->checkbox() ?>

        <?= $form->field($model, 'criminal')->checkbox() ?>

        <?= $form->field($model, 'status')->textInput() ?>

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
