<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

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

        <?= $form->field($model, 'region')->dropDownList([$regions]) ?>

        <?= $form->field($model, 'trials')->checkbox() ?>

        <?= $form->field($model, 'status')->textInput() ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
