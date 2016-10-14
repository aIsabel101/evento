<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\eventoExpositor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-expositor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'evento_id')->textInput() ?>

    <?= $form->field($model, 'expositor_id')->textInput() ?>

     <?= $form->field($model, 'fecha_ini')->textInput() ?>
    
   
   
    <?= $form->field($model, 'hora_inicio')->textInput() ?>

    <?= $form->field($model, 'hora_fin')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
