<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecursoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recurso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'evento_id') ?>

    <?= $form->field($model, 'colaborador_id') ?>

    <?= $form->field($model, 'tema_id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'cantidad') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'detalle') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
