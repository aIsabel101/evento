<?php

use yii\helpers\Html; 
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Evento;
use app\models\Paquete;
use app\models\Inscripcion;
use dosamigos\qrcode\formats\MailTo;
use dosamigos\qrcode\QrCode;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form">

    <?php
    
    echo $model->id;
    
    $form = ActiveForm::begin(); ?>    
   <div class="col-xs-12">
        <div class="col-xs-4">
            <?php
            //Evento::find()->all()
            $sql = 'SELECT  e.*
            FROM evento e
            WHERE  e.id not in (
            SELECT  DISTINCT(e.id)
            FROM evento e , inscripcion  i
            WHERE e.id=i.evento_id  and i.user_id ='.$model->id.'
            )';

            
            ?>
            
             <?= $form->field($modelinscripcion, 'evento_id')->dropDownList(
             ArrayHelper::map(Evento::findBySql($sql)->all(), 'id', 'nombre'),
             ['prompt'=>'Seleccionar Evento']
                 ) ?>
        </div>
        <div class="col-xs-4">

         <?= $form->field($modelinscripcion, 'paquete_id')->dropDownList(
            ArrayHelper::map(Paquete::find()->all(), 'id', 'nombre'),
            ['prompt'=>'Seleccionar Paquete']
                ) ?>
        </div>
        <div class="col-xs-4">
            
          <?= $form->field($modelinscripcion, 'monto')->textInput() ?>
            
        </div>
     </div>
    
      
    <div class="col-xs-12">
        
          <div class="col-xs-12">
              
             <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Inscribir', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          <?= Html::a('Ver Inscripcion', ['viewinscripcion', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        
        
             </div>
  
          </div>   
   </div>  

   
        <?php ActiveForm::end(); ?>

</div>

