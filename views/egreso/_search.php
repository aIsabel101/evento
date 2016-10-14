<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EgresoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="egreso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'acreditacion_id') ?>

    <?= $form->field($model, 'recurso_id') ?>

    <?= $form->field($model, 'evento_id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'costo') ?>

    <?php // echo $form->field($model, 'cantidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
