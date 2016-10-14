<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoEvento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-evento-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-xs-6">

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
     <div class="col-xs-6">
    
    <?php echo $form->field($model, 'estado')->dropDownList(['Activo' => 'Activo', 'Inactivo' => 'Inactivo']); ?>

</div>
    <div class="col-xs-12">
    <?= $form->field($model, 'descripcion')->textarea(['rows' => 1]) ?>
    
    </div>
     <div class="col-xs-12">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
