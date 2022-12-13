<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Workman $model */

$this->title = 'Create Workman';
$this->params['breadcrumbs'][] = ['label' => 'Workmen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
