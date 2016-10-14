<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\TipoPaquete;
use app\models\Evento;

/* @var $this yii\web\View */
/* @var $model app\models\Paquete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paquete-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-xs-12">
        <div class="col-xs-4">
          
          <?= $form->field($model, 'evento_id')->dropDownList(
             ArrayHelper::map(Evento::find()->all(), 'id', 'nombre'),
             ['prompt'=>'Seleccionar Evento']
                 ) ?>    
            
        </div>
        
        <div class="col-xs-4">
           
           
       <?= $form->field($model, 'tipo_paquete_id')->dropDownList(
             ArrayHelper::map(TipoPaquete::find()->all(), 'id', 'nombre'),
             ['prompt'=>'Seleccionar Tipo Paquete']
                 ) ?>
 
        </div>
        
        <div class="col-xs-4">
         
             <?= $form->field($model, 'monto')->textInput() ?>
        </div>
        
        
    </div>
    
    <div class="col-xs-12">
        <div class="col-xs-4">
        <?= $form->field($model, 'descripcion')->textarea(['rows' => 1]) ?>
        </div>
        
        <div class="col-xs-4">
        
      <?php echo $form->field($model, 'estado')->dropDownList(['Activo' => 'Activo', 'Inactivo' => 'Inactivo'],['prompt'=>'Seleccione Estado']); ?>


            
        </div>
        
        <div class="col-xs-4">
         
             
            
        </div>
        
        
    </div>


    <div class="col-xs-12">
        <div class="col-xs-4">
            
        </div>
        <div class="col-xs-4">
            <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

            
            
            </div>
    </div>
   
            
   
    <?php ActiveForm::end(); ?>

</div>
