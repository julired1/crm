<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Identification $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $model -> isNewRecord ?  'Создать идентификацию ': 'Изменить идентификацию';
$this->params['breadcrumbs'][] = ['label' => 'Идентификация', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="identification-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'employees_id')->textInput() ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
