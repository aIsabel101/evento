<?php

use yii\helpers\Html; 
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Evento;
use app\models\Paquete;
use app\models\Acreditacion;


 

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-acreditacion">

    <?php $form = ActiveForm::begin(); ?>
    
    
    
    
   <div class="col-xs-12">
        
        
       
         <div class="col-xs-4">
            
         
    </div>
        <div class="col-xs-4">
            
          <?= $form->field($modelacreditacion, 'estado')->dropDownList(['Pendiente' => 'Pendiente', 'Entregado' => 'Entregado'],['prompt'=>'Seleccione Estado']); ?>
       
        </div>
     </div>
    
      
    <div class="col-xs-12">
        
          <div class="col-xs-12">
              
             <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Registrar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          
             </div>
  
    </div>   
        </div>  

   
    <?php ActiveForm::end(); ?>

</div>

