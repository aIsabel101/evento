<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Egreso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="egreso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'acreditacion_id')->textInput() ?>

    <?= $form->field($model, 'recurso_id')->textInput() ?>

    <?= $form->field($model, 'evento_id')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costo')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
