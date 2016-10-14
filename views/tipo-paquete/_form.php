<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoPaquete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-paquete-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-12">
        
        <div class="col-xs-4">
         <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
         
        </div>
    
        <div class="col-xs-8">
        
        <?= $form->field($model, 'descripcion')->textarea(['rows' => 1]) ?>
  
         </div>
    
        
    
    </div>

    <div class="col-xs-12">
            <div class="col-xs-4">
               <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear Tipo Paquete' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>   
            </div>
            
            <div class="col-xs-4">
              
            </div>
        
        
         </div>
    <?php ActiveForm::end(); ?>

</div>
