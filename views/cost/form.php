<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Cost $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $model -> isNewRecord ?  'Создать ': 'Изменить';
$this->params['breadcrumbs'][] = ['label' => 'Табель затрат', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cost-create">

    <h1><?= Html::encode($this->title) ?></h1>



<div class="cost-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'building_id')->textInput() ?>

    <?= $form->field($model, 'employees_id')->textInput() ?>

    <?= $form->field($model, 'product')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>
