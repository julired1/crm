<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\Building $model */
/** @var yii\widgets\ActiveForm $form */
/** @var @Regions array*/

$this->title = $model -> isNewRecord ?  'Создать объект ': 'Изменить объект';
$this->params['breadcrumbs'][] = ['label' => 'Строительные объекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="building-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textarea(['rows' => 1]) ?>

        <?= $form->field($model, 'region')->dropDownList ([$regions]) ?>

        <?= $form->field($model, 'trials')->checkbox() ?>
        
        <?= $form->field($model, 'limit')->textInput() ?>
        
        <?= $form->field($model, 'status')->dropDownList([1 =>'Активный', 2=>'Завершен',3=> 'На проверке']) ?>
        
        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
    'mask' => '+7-(999)-999-99-99',]) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
