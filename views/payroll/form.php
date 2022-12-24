<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\models\Building;
use kartik\time\TimePicker;

/** @var yii\web\View $this */
/** @var app\models\Payroll $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $model -> isNewRecord ?  'Создать': 'Изменить';
$this->params['breadcrumbs'][] = ['label' => 'Табель зарплат', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-create">

    <h1><?= Html::encode($this->title) ?></h1>



    <div class="payroll-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'employees_id')->dropDownList ([$employees]) ?>

        <?= $form->field($model, 'building_id')->dropDownList([$Building]) ?>

       <?= $form->field($model, 'speciality')->textInput() ?>

        <?= $form->field($model,'worktime')->textInput() ?>

        <?= $form->field($model, 'coefficient')->textInput() ?>

        <?= $form->field($model, 'vat')->textInput() ?>

        <?= $form->field($model, 'daily')->textInput() ?>

        <?= $form->field($model, 'hourly')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
