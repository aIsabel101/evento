<?php

use yii\helpers\Html; 
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;

 

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-xs-12">
        
        <div class="col-xs-4">
           <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>  
            
        </div>
        <div class="col-xs-4">
            
             <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?> 
            
        </div>
    </div>
    
    <div class="col-xs-12">
        <div class="col-xs-3">
             <?= $form->field($model, 'ci')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-xs-3">
              <?= $form->field($model, 'fecha_nacimiento')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-d'
        ]
]);?>

        </div>
        <div class="col-xs-6">
               <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
  
 
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-4">
             <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
 
        </div>
        
        <div class="col-xs-4">
             <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?> 
        </div>
        <div class="col-xs-4">
            
  <?= $form->field($model, 'telefono')->textInput() ?>
        </div>
        
 <div class="col-xs-12">
        
        <div class="col-xs-4">
             <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
              <?= $form->field($model, 'direccion')->textarea(['rows' => 1]) ?>

        </div>
        <div class="col-xs-4">
              <?php echo $form->field($model, 'estado')->dropDownList(['Activo' => 'Activo', 'Inactivo' => 'Inactivo'],['prompt'=>'Seleccione Estado']); ?>

        </div>
        

     
    </div>
   

   
    <div class="col-xs-12">
        
        
        <div class="col-xs-4">
            <div class="form-group">
    <label for="exampleInputEmail1">Tipo Usuario</label>
            
             <?php echo Html::dropDownList('rol_id', 1, 
           ArrayHelper::map(\app\models\Tipousuario::find()->all(), 'id', 'nombre')); ?>  
           

        </div>
    </div>

    </div>

   
    <div class="col-xs-12">
        
          <div class="col-xs-12">
              
             <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
  
    </div>   
        </div>  

   
    <?php ActiveForm::end(); ?>

</div>
