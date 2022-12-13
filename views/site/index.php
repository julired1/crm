<?php
use yii\bootstrap5\Html;
/** @var yii\web\View $this */

$this->title = 'CRM_ПРОЕКТ';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">CRM</h1>

        <p class="lead">Для вашего удобства можете перемещаться по базам, представленным ниже.</p>

        <p>
        <?= Html::a('Строительные объекты', ['building/index'],['class' =>'btn btn-success']) ?>
        </p>
    </div>

</div>
