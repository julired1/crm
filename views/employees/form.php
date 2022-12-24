<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\models\Building;
use kartik\date\DatePicker;
use yii\widgets\MaskedInput;
use kartik\time\TimePicker;

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
        
        <?= $form->field($model,'naks')->widget(DatePicker::class, []) ?>


        <?= $form->field($model, 'type')->dropDownList ([1=> 'Рабочие',2=> 'Call центр',3=> 'Административная группа',4=> 'Бухгалтерия',]) ?>

        
        <?= $form->field($model, 'password')->passwordInput() ?>
        
        <?= $form->field($model, 'is_admin')->checkbox() ?>

        <?= $form->field($model, 'speciality')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'region')->dropDownList ([$regions]) ?>

        <?= $form->field($model, 'examination')->checkbox() ?>

        <?= $form->field($model, 'criminal')->checkbox() ?>
        
        <?= $form->field($model, 'status')->dropDownList ([1 =>'Работает', 2=>'Уволен',3=>'Межвахта',4=> 'На проверке']);?>
        
        <?= $form->field($model, 'email')->textarea(['rows' => 6]) ?>

        <?= $form->field($model,'birthday')->widget(DatePicker::class, []) ?>

        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
    'mask' => '+7-(999)-999-99-99',]) ?>

        <?= $form->field($model, 'medical')->checkbox() ?>

        <?= $form->field($model, 'education')->textarea(['rows' => 6]) ?>

        <?= $form->field($model,'worktime')->widget(TimePicker::class,[]) ?>



        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
