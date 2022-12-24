<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use kartik\date\DatePicker;
/** @var yii\web\View $this */
/** @var app\models\Workman $model */
/** @var yii\widgets\ActiveForm $form */
/** @var @Buildings array*/

$this->title = $model -> isNewRecord ?  'Добавить рабочего ': 'Изменить рабочего';
$this->params['breadcrumbs'][] = ['label' => 'Рабочие', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="workman-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'building_id')->dropDownList([$Building]) ?>

        <?= $form->field($model, 'employees_id')->textInput() ?>

        <?= $form->field($model, 'medical')->checkbox() ?>

        <?= $form->field($model,'naks')->widget(DatePicker::class, ['dd.mm.yyyy']) ?>

        <?= $form->field($model, 'criminal')->checkbox() ?>

        <?= $form->field($model, 'speciality')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'limit')->textInput() ?>

        <?= $form->field($model, 'examination')->checkbox() ?>

        <?= $form->field($model, 'education')->textarea(['rows' => 6]) ?>


        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
