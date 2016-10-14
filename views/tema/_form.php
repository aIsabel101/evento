<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Tema */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tema-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-xs-12">
        
        <div class="col-xs-4">
             <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-4">
                
                
                 <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-4">
                    
                     <?php echo $form->field($model, 'estado')->dropDownList(['Activo' => 'Activo', 'Inactivo' => 'Inactivo'],['prompt'=>'Seleccione Estado']); ?>
                    
                </div>
                
                
            
      
        
    </div>
   

    <div class="col-xs-12">
   
    
            <div class="col-xs-12">
             <?= $form->field($model, 'descripcion')->textarea(['rows' => 1]) ?>

          </div>
        </div>
    <div class="col-xs-12">
    <div class="col-xs-4">
        
     <?php 
    //echo $form->field($model, 'id_usuario')->widget(Select2::classname(), [
//   'data' => ArrayHelper::map(User::find()->all(),'id', 'nombre'),
//    'language' => 'es',
//    'options' => ['placeholder'=> 'Seleccionar usuario'],
//    'pluginOptions' => [
//        'allowClear' => true
//    ],
//]);
//
     ?> 
    </div>
        </div>
     <div class="col-xs-12">
        

    <div class="col-xs-12">
        
          <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
        
    </div>
          </div>
   

  

    <?php ActiveForm::end(); ?>

</div>
